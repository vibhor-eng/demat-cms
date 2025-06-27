<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Redirect;

class AuthorController extends Controller
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
        $channels_list = get_channels_list();
        $default_channel_id = $request->channel ? (int)$request->channel : (int)\Auth::user()->channel_id;
        $author = Author::where(['channel_id' => $default_channel_id ,'is_deleted' => 0])->orderBy('created_date', 'desc');
        if(isset($request->author_status)){
            $author->where('status', (int)$request->author_status);
        }
        else
        {
            $author->where('status', 1);
        }
        if(sizeof($request->all()) > 0){
            if(isset($request->keyword) && $request->keyword !=''){
                $author = $author->where('regional_name', 'like', '%' . $request->keyword . '%');
            }
        }
        $paginated_existing_authors = $author->orderBy('regional_name')->paginate($this->paginationSize);
        $totalAuthorCount =$author->count(); //total count

        // to export
        // $existing_authors = Author::where('channel_id', $default_channel_id)->orderBy('author_name', 'asc')->get();
        // $is_downloaded          =  $request->get('is_downloaded')?$request->get('is_downloaded'):'';
        // if(isset($is_downloaded)  && $is_downloaded == 1) {
        //     $path       = $this->downloadReportCSV($existing_authors,$default_channel_id);
        //     $headers    = array('Content-Type: application/csv');
        //     return response()->download($path, 'author.csv',$headers);
        // }
        return view('admin.author.list',compact('paginated_existing_authors','totalAuthorCount','channels_list','default_channel_id'));
    }

    public function create()
    {
        
        $channels_list = get_channels_list();
        return view('admin.author.create', compact('channels_list'));
        
    }

    public function store(Request $request){

        Author::validateRequest($request, 'create');  
        $isAuthor = Author::where('regional_name', $request->author_name)->where('channel_id', $request->channel_id)->count();
        if($isAuthor > 0){
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors('Author already exists');
        }
        Author::createOrUpdate($request, 'create');
        $successMsg = 'Author has been successfully added';
        return redirect()->back()->with('success', $successMsg);

    }

    public function delete(Request $request){

        try{

            $author_id = $request->id;

            $author_delete = Author::where(['id' => $author_id])->update(['is_deleted' => 1,'deleted_by' => \Auth::user()->id,'deleted_at' => date('Y-m-d H:i:s')]);

            return response()->json(['msg' => 'Author has been deleted successfully.','status' => true]); 

        }catch(\Exception $e){

            return response()->json(['msg' => $e->getMessage(),'status' => false]);


        }

    }

    public function update(Request $request){

        if ($request->isMethod('post')) {

            Author::validateRequest($request, 'edit');
            Author::createOrUpdate($request, 'edit');
            $successMsg = 'Author has been successfully updated';
             return redirect()->back()->with('success', $successMsg);
        }

        $channels_list = get_channels_list();
        $existing_author = Author::where('id', $request->id)->first();
        return view('admin.author.edit', compact('existing_author', 'channels_list'));

    }
}
