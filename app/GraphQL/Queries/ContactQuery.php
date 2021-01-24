<?php

namespace App\GraphQL\Queries;

use App\Models\Contact;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Auth;
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

		return Contact::where('first_name', 'like', '%'.$args['search'].'%')->paginate();
	}
	public function contacts($rootValue, array $args, GraphQlContext $context = null, ResolveInfo $resolveInfo){

		return Contact::where('added_by',Auth::id())->paginate();
	}


}
