<?php

namespace App\GraphQL\Queries;

use App\Models\Contact;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ContactQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }
	public function search($rootValue, array $args, GraphQlContext $context = null, ResolveInfo $resolveInfo){
    	if(Arr::exists($args, "search") && !empty($args['search'])) {
		    $search = $args['search'];
		    return Contact::whereLike(['first_name', 'last_name', 'middle_name'], $args['search'])
				    ->orwhereHas("contact_phones", function ($query) use($search){
					    $query->where("phone_number","like", "%$search%");
				    })
				    ->orwhereHas("contact_emails", function ($query) use($search){
					    $query->where("email","like", "%$search%");
				    })
				    ->orwhereHas("contact_social_profiles", function ($query) use($search){
					    $query->where("social_profile","like", "%$search%");
				    })
				    ->orwhereHas("contact_addresses", function ($query) use($search){
					    $query->where("city","like", "%$search%");
					    $query->orwhere("street","like", "%$search%");
					    $query->orwhere("building","like", "%$search%");
				    })
				    ->get();
	    }

    	return null;
	}

//	public function contacts($rootValue, array $args, GraphQlContext $context = null, ResolveInfo $resolveInfo){
//
//    	$data = ContactPaginationResource::make(Contact::where('added_by',Auth::id())->paginate());
//
//    	Log::channel("graphql-log")->info(json_encode($data));
//		return Contact::where('added_by',Auth::id())->paginate();
//	}


}
