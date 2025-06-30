<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Redirect;

class TagsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $paginationSize;
    public function __construct()
    {
        $this->middleware('auth');
        $this->paginationSize = 50;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(Request $request)
    {
        $channel = (int)($request->get('channel') ?? (int)\Auth::user()->channel_id);
        $channels_list = get_channels_list();
        $tagSearchTerm = $request->get('tagSearchTerm');
        $exact_match = $request->get('exact_match');
        $sort_by = $request->get('sort_by');

        $paginated_existing_tags = Tag::getdefault($channel);
            if($tagSearchTerm!=null){
                $param = $request->get('tagSearchTerm');

                $paginated_existing_tags = $paginated_existing_tags->where(function($query) use ($param){
                        return $query
                            ->where('regional_name', 'LIKE', '%' . $param . '%')
                            ->orWhere('english_name', 'LIKE', '%' . $param . '%');
                    });
            }           
                                            
            $paginated_existing_tags = $paginated_existing_tags->paginate($this->paginationSize); 
            return view('admin.topic.list', compact('paginated_existing_tags', 'channels_list', 'channel', 'tagSearchTerm','exact_match')); 
    }

    public function create()
    {
        
        $channels_list = get_channels_list();
        return view('admin.topic.create', compact('channels_list'));
        
    }

    public function store(Request $request){

        //validation
        $validatedData = $request->validate([
            'topic_name' => 'required|max:255',
            'topic_eng_name' => 'required'
        ]);

        $slug = convert_to_slug($request->get('topic_eng_name'));
        $userDetails = \Auth::user();
        // dd($request->get('channel'));
        $tagObj = Tag::where(['slug' => $slug, 'channel_id' => $request->get('channel')])->first();
        if($tagObj){
            return redirect()->back()->with('errors', "Slug can not be duplicate.");
        }


        $tags = new Tag();
        $channelName = strtolower(getChannelLabelName($request->get('channel_id')));
        $tags->regional_name = $request->get('topic_name');
        $tags->english_name = $request->get('topic_eng_name');   
        $tags->headline = $request->get('topic_heading');
        $tags->description = $request->get('topicDesc');
        $tags->channel_id = $request->get('channel_id');
        $tags->seo_title = $request->get('topic_seo_title');
        $tags->seo_description = $request->get('topic_seo_description');
        $tags->seo_keyword = $request->get('topic_seo_eng_title');
        $tags->seo_reg_keywords = $request->get('topic_seo_reg_title');
        $tags->created_by = \Auth::user()->id;
        $tags->slug = $slug;
        $tags->created_by = $userDetails->id;

        
        
        $tags->save();


       


        // $this->makeJsonforTags($tags);
        $successMsg = 'tags has been added successfully';
        return redirect()->back()->with('success', $successMsg);

    }

    public function delete(Request $request){

        try{

            $tag_id = $request->id;

            $tag_delete = Tag::where(['id' => $tag_id])->update(['is_deleted' => 1,'deleted_by' => \Auth::user()->id,'deleted_at' => date('Y-m-d H:i:s')]);

            return response()->json(['msg' => 'Tag has been deleted successfully.','status' => true]); 

        }catch(\Exception $e){

            return response()->json(['msg' => $e->getMessage(),'status' => false]);


        }

    }

    public function update(Request $request){

        if ($request->isMethod('post')) {

            //validation
            $validatedData = $request->validate([
                'topic_name' => 'required|max:255',
                'topic_eng_name' => 'required'
            ]);
            $tag = Tag::where('id', $request->get('tag_id'))->first();
            $tag->regional_name = $request->get('topic_name');
            $tag->english_name = $request->get('topic_eng_name'); 
            $tag->headline = $request->get('topic_heading');
            $tag->description = $request->get('topicDesc');
            //$tag->channel_id = $request->get('channel');
            $tag->seo_title = $request->get('topic_seo_title');
            $tag->seo_description = $request->get('topic_seo_description');
            $tag->seo_keyword = $request->get('topic_seo_eng_title');
            $tag->seo_reg_keywords = $request->get('topic_seo_reg_title');
            // $tag->slug = convert_to_slug($request->get('engName'));
            // dd($tag->toArray());
            $tag->save();

            

            // $this->makeJsonforTags($tag);

            $successMsg = 'tags has been edited successfully';
            return redirect()->back()->with('success', $successMsg);

        }

        $channels_list = get_channels_list();
        $existing_tag = Tag::where('id', $request->id)->first();
        return view('admin.topic.edit', compact('existing_tag', 'channels_list'));

    }
}
