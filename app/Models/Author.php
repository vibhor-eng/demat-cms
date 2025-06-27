<?php

namespace App\Models;


// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    // use SoftDeletes;
    protected $table = 'authors';
    public $timestamps = false;

    public static function validateRequest($request, $type = 'create'){
    	$validatedData = $request->validate([
            'author_name' => 'required|max:100',
            'author_eng_name' => ($type == "create") ? 'required' : "",
            //'authorImg' => $type == 'create' ? 'required|file|max:1024': $type == 'edit' && $request->existing_author_img == null ? 'required|file|max:1024': '',
        ]);
    }

    public static function createOrUpdate($request, $type){
    	if($type == 'create'){
            $author = new Author;
            $channelName = strtolower(getChannelLabelName($request->get('channel')));
            // $author->unique_author_id = getNextSequence('author_'.$channelName);
        }
    	else{
            $author = Author::where('id', $request->author_id)->first();
        }
        $author->regional_name = $request->get('author_name');
        $author->english_name = $request->get('author_eng_name');
        $author->email = $request->get('author_email_id');
        $author->slug = ($type == "create") ? convert_to_slug($request->get('author_eng_name')) : $request->get('author_slug');
        $author->designation = $request->get('author_designation');
        $author->twitter_link = $request->get('author_twitter_link');
        $author->description = strip_tags($request->get('authorDesc'));
        $author->created_by = \Auth::user()->id;
        // $author->authorRedirect = strip_tags($request->get('authorRedirect'));
        // $author->mergedAuthor = $request->get('mergedAuthor');
        $author->channel_id = (int)$request->get('channel_id');
        if($request->file('author_image')!= null) {

            $author_image = $request->file('author_image');
			$filename = str_replace(' ', '_', $request->file('author_image')->getClientOriginalName());
			$filename = md5(time()).'.'.$request->file('author_image')->getClientOriginalExtension();

            $author_image->move(public_path('uploads'), $filename);

			// \Storage::disk('s3')->putFileAs(env('S3_IMAGE_UPLOAD_PATH').'/author/', $request->file('author_image'), $filename);

			$author->image = '/uploads/'.$filename;
        }
        $author->status = ($request->get('author_status') == 'on') ? 1 : 0;
        if($author->save())
        {
            // $author->author_image = "asdasdasd.jpg";
            // $jobDataS3['url'] = '/'.env('API_ENV').'/author-jsons/'.$request->get('channel');
            // \App\Jobs\CallRouteJob::dispatch($jobDataS3)->delay(Carbon::now()->addseconds((int)env('QUEUE_DELAY')))->onQueue('queue1');
            // self::authorJsonOnS3($author->channel_id);
            // self::insertDataIntoElasticSearch($author, $type);
			return '1';
        }
		else{
			return '0';
        }
    }
}   
