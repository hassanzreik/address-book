<?php

namespace App\GraphQL\Mutations;

use App\Helpers\Helper;
use App\Models\Contact;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ContactMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

	/**
	 * Return a value for the field.
	 *
	 * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
	 * @param  mixed[]  $args The arguments that were passed into the field.
	 * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
	 * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
	 * @return mixed
	 */
	public function create($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){


		$contact = new Contact();
		$contact = Helper::fill($args)->in($contact)->get();
		$contact->save();
		$relations = $contact->getRelations();
		foreach($relations as $k => $v){
			foreach ($args[$k] as $key => $values){
				$model = new $v();
				$model = Helper::fill($values)->in($model)->get();
				$contact->{$k}()->save($model);
//				Log::channel('graphql-log')->warning(json_encode($values));
			}

		}

		return $contact;
	}
}