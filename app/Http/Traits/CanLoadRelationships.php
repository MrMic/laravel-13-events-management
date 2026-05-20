<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CanLoadRelationships
{
    // ______________________________________________________________________
    public function loadRelationships(
        Model|QueryBuilder|EloquentBuilder|HasMany $for,
        ?array $relations = null,
    ): Model|QueryBuilder|EloquentBuilder|HasMany {
        // INFO: $this->relations will be defined in the class using this trait.
        $relations = $relations ?? ($this->relations ?? []);

        foreach ($relations as $relation) {
            $for->when(
                $this->shouldIncludeRelation($relation),
                fn ($q) => $for instanceof Model
                    ? $for->load($relation)
                    : $q->with($relation),
            );
        }

        return $for;
    }
    // ______________________________________________________________________
    protected function shouldIncludeRelation(string $relation): bool
    {
        $include = request()->query("include", "");
        if (!$include) {
            return false;
        }

        $relations = array_map("trim", explode(",", $include));
        return in_array($relation, $relations);
    }
}
