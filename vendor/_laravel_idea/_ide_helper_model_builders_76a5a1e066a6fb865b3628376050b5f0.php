<?php //42b9a0680b1566629d2389db01b138dc
/** @noinspection all */

namespace LaravelIdea\Helper\App\Models {

    use App\Models\Docum;
    use App\Models\Tech;
    use App\Models\Type;
    use App\Models\Area;
    use App\Models\File;
    use App\Models\Owner;
    use App\Models\Log;
    use App\Models\Role;
    use App\Models\Tool;
    use App\Models\User;
    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\Query\Expression;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Pagination\Paginator;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;
    
    /**
     * @method Brand|null getOrPut($key, $value)
     * @method Brand|$this shift(int $count = 1)
     * @method Brand|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Brand|$this pop(int $count = 1)
     * @method Brand|null pull($key, $default = null)
     * @method Brand|null last(callable $callback = null, $default = null)
     * @method Brand|$this random(int|null $number = null)
     * @method Brand|null sole($key = null, $operator = null, $value = null)
     * @method Brand|null get($key, $default = null)
     * @method Brand|null first(callable $callback = null, $default = null)
     * @method Brand|null firstWhere(string $key, $operator = null, $value = null)
     * @method Brand|null find($key, $default = null)
     * @method Brand[] all()
     */
    class _IH_Brand_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Brand[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }
    
    /**
     * @method _IH_Brand_QB whereId($value)
     * @method _IH_Brand_QB whereName($value)
     * @method _IH_Brand_QB whereCreatedAt($value)
     * @method _IH_Brand_QB whereUpdatedAt($value)
     * @method Brand baseSole(array|string $columns = ['*'])
     * @method Brand create(array $attributes = [])
     * @method _IH_Brand_C|Brand[] cursor()
     * @method Brand|null|_IH_Brand_C|Brand[] find($id, array $columns = ['*'])
     * @method _IH_Brand_C|Brand[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Brand|_IH_Brand_C|Brand[] findOrFail($id, array $columns = ['*'])
     * @method Brand|_IH_Brand_C|Brand[] findOrNew($id, array $columns = ['*'])
     * @method Brand first(array|string $columns = ['*'])
     * @method Brand firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Brand firstOrCreate(array $attributes = [], array $values = [])
     * @method Brand firstOrFail(array $columns = ['*'])
     * @method Brand firstOrNew(array $attributes = [], array $values = [])
     * @method Brand firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Brand forceCreate(array $attributes)
     * @method _IH_Brand_C|Brand[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Brand_C|Brand[] get(array|string $columns = ['*'])
     * @method Brand getModel()
     * @method Brand[] getModels(array|string $columns = ['*'])
     * @method _IH_Brand_C|Brand[] hydrate(array $items)
     * @method Brand make(array $attributes = [])
     * @method Brand newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Brand[]|_IH_Brand_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Brand[]|_IH_Brand_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Brand sole(array|string $columns = ['*'])
     * @method Brand updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Brand_QB extends _BaseBuilder {}
    
    /**
     * @method Family|null getOrPut($key, $value)
     * @method Family|$this shift(int $count = 1)
     * @method Family|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Family|$this pop(int $count = 1)
     * @method Family|null pull($key, $default = null)
     * @method Family|null last(callable $callback = null, $default = null)
     * @method Family|$this random(int|null $number = null)
     * @method Family|null sole($key = null, $operator = null, $value = null)
     * @method Family|null get($key, $default = null)
     * @method Family|null first(callable $callback = null, $default = null)
     * @method Family|null firstWhere(string $key, $operator = null, $value = null)
     * @method Family|null find($key, $default = null)
     * @method Family[] all()
     */
    class _IH_Family_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Family[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }
    
    /**
     * @method _IH_Family_QB whereId($value)
     * @method _IH_Family_QB whereName($value)
     * @method _IH_Family_QB whereCreatedAt($value)
     * @method _IH_Family_QB whereUpdatedAt($value)
     * @method Family baseSole(array|string $columns = ['*'])
     * @method Family create(array $attributes = [])
     * @method _IH_Family_C|Family[] cursor()
     * @method Family|null|_IH_Family_C|Family[] find($id, array $columns = ['*'])
     * @method _IH_Family_C|Family[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Family|_IH_Family_C|Family[] findOrFail($id, array $columns = ['*'])
     * @method Family|_IH_Family_C|Family[] findOrNew($id, array $columns = ['*'])
     * @method Family first(array|string $columns = ['*'])
     * @method Family firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Family firstOrCreate(array $attributes = [], array $values = [])
     * @method Family firstOrFail(array $columns = ['*'])
     * @method Family firstOrNew(array $attributes = [], array $values = [])
     * @method Family firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Family forceCreate(array $attributes)
     * @method _IH_Family_C|Family[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Family_C|Family[] get(array|string $columns = ['*'])
     * @method Family getModel()
     * @method Family[] getModels(array|string $columns = ['*'])
     * @method _IH_Family_C|Family[] hydrate(array $items)
     * @method Family make(array $attributes = [])
     * @method Family newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Family[]|_IH_Family_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Family[]|_IH_Family_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Family sole(array|string $columns = ['*'])
     * @method Family updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Family_QB extends _BaseBuilder {}
    
    /**
     * @method File|null getOrPut($key, $value)
     * @method File|$this shift(int $count = 1)
     * @method File|null firstOrFail($key = null, $operator = null, $value = null)
     * @method File|$this pop(int $count = 1)
     * @method File|null pull($key, $default = null)
     * @method File|null last(callable $callback = null, $default = null)
     * @method File|$this random(int|null $number = null)
     * @method File|null sole($key = null, $operator = null, $value = null)
     * @method File|null get($key, $default = null)
     * @method File|null first(callable $callback = null, $default = null)
     * @method File|null firstWhere(string $key, $operator = null, $value = null)
     * @method File|null find($key, $default = null)
     * @method File[] all()
     */
    class _IH_File_C extends _BaseCollection {
        /**
         * @param int $size
         * @return File[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }
    
    /**
     * @method _IH_File_QB whereId($value)
     * @method _IH_File_QB whereFileableId($value)
     * @method _IH_File_QB whereFileableType($value)
     * @method _IH_File_QB whereName($value)
     * @method _IH_File_QB wherePath($value)
     * @method _IH_File_QB whereCreatedAt($value)
     * @method _IH_File_QB whereUpdatedAt($value)
     * @method File baseSole(array|string $columns = ['*'])
     * @method File create(array $attributes = [])
     * @method _IH_File_C|File[] cursor()
     * @method File|null|_IH_File_C|File[] find($id, array $columns = ['*'])
     * @method _IH_File_C|File[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method File|_IH_File_C|File[] findOrFail($id, array $columns = ['*'])
     * @method File|_IH_File_C|File[] findOrNew($id, array $columns = ['*'])
     * @method File first(array|string $columns = ['*'])
     * @method File firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method File firstOrCreate(array $attributes = [], array $values = [])
     * @method File firstOrFail(array $columns = ['*'])
     * @method File firstOrNew(array $attributes = [], array $values = [])
     * @method File firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method File forceCreate(array $attributes)
     * @method _IH_File_C|File[] fromQuery(string $query, array $bindings = [])
     * @method _IH_File_C|File[] get(array|string $columns = ['*'])
     * @method File getModel()
     * @method File[] getModels(array|string $columns = ['*'])
     * @method _IH_File_C|File[] hydrate(array $items)
     * @method File make(array $attributes = [])
     * @method File newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|File[]|_IH_File_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|File[]|_IH_File_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method File sole(array|string $columns = ['*'])
     * @method File updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_File_QB extends _BaseBuilder {}
    
    /**
     * @method Group|null getOrPut($key, $value)
     * @method Group|$this shift(int $count = 1)
     * @method Group|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Group|$this pop(int $count = 1)
     * @method Group|null pull($key, $default = null)
     * @method Group|null last(callable $callback = null, $default = null)
     * @method Group|$this random(int|null $number = null)
     * @method Group|null sole($key = null, $operator = null, $value = null)
     * @method Group|null get($key, $default = null)
     * @method Group|null first(callable $callback = null, $default = null)
     * @method Group|null firstWhere(string $key, $operator = null, $value = null)
     * @method Group|null find($key, $default = null)
     * @method Group[] all()
     */
    class _IH_Group_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Group[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }
    
    /**
     * @method _IH_Group_QB whereId($value)
     * @method _IH_Group_QB whereName($value)
     * @method _IH_Group_QB whereCreatedAt($value)
     * @method _IH_Group_QB whereUpdatedAt($value)
     * @method Group baseSole(array|string $columns = ['*'])
     * @method Group create(array $attributes = [])
     * @method _IH_Group_C|Group[] cursor()
     * @method Group|null|_IH_Group_C|Group[] find($id, array $columns = ['*'])
     * @method _IH_Group_C|Group[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Group|_IH_Group_C|Group[] findOrFail($id, array $columns = ['*'])
     * @method Group|_IH_Group_C|Group[] findOrNew($id, array $columns = ['*'])
     * @method Group first(array|string $columns = ['*'])
     * @method Group firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Group firstOrCreate(array $attributes = [], array $values = [])
     * @method Group firstOrFail(array $columns = ['*'])
     * @method Group firstOrNew(array $attributes = [], array $values = [])
     * @method Group firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Group forceCreate(array $attributes)
     * @method _IH_Group_C|Group[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Group_C|Group[] get(array|string $columns = ['*'])
     * @method Group getModel()
     * @method Group[] getModels(array|string $columns = ['*'])
     * @method _IH_Group_C|Group[] hydrate(array $items)
     * @method Group make(array $attributes = [])
     * @method Group newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Group[]|_IH_Group_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Group[]|_IH_Group_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Group sole(array|string $columns = ['*'])
     * @method Group updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Group_QB extends _BaseBuilder {}
    
    /**
     * @method Log|null getOrPut($key, $value)
     * @method Log|$this shift(int $count = 1)
     * @method Log|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Log|$this pop(int $count = 1)
     * @method Log|null pull($key, $default = null)
     * @method Log|null last(callable $callback = null, $default = null)
     * @method Log|$this random(int|null $number = null)
     * @method Log|null sole($key = null, $operator = null, $value = null)
     * @method Log|null get($key, $default = null)
     * @method Log|null first(callable $callback = null, $default = null)
     * @method Log|null firstWhere(string $key, $operator = null, $value = null)
     * @method Log|null find($key, $default = null)
     * @method Log[] all()
     */
    class _IH_Log_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Log[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }
    
    /**
     * @method _IH_Log_QB whereId($value)
     * @method _IH_Log_QB whereUserId($value)
     * @method _IH_Log_QB whereToolId($value)
     * @method _IH_Log_QB whereComment($value)
     * @method _IH_Log_QB whereType($value)
     * @method _IH_Log_QB whereBefore($value)
     * @method _IH_Log_QB whereAfter($value)
     * @method _IH_Log_QB whereCreatedAt($value)
     * @method _IH_Log_QB whereUpdatedAt($value)
     * @method Log baseSole(array|string $columns = ['*'])
     * @method Log create(array $attributes = [])
     * @method _IH_Log_C|Log[] cursor()
     * @method Log|null|_IH_Log_C|Log[] find($id, array $columns = ['*'])
     * @method _IH_Log_C|Log[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Log|_IH_Log_C|Log[] findOrFail($id, array $columns = ['*'])
     * @method Log|_IH_Log_C|Log[] findOrNew($id, array $columns = ['*'])
     * @method Log first(array|string $columns = ['*'])
     * @method Log firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Log firstOrCreate(array $attributes = [], array $values = [])
     * @method Log firstOrFail(array $columns = ['*'])
     * @method Log firstOrNew(array $attributes = [], array $values = [])
     * @method Log firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Log forceCreate(array $attributes)
     * @method _IH_Log_C|Log[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Log_C|Log[] get(array|string $columns = ['*'])
     * @method Log getModel()
     * @method Log[] getModels(array|string $columns = ['*'])
     * @method _IH_Log_C|Log[] hydrate(array $items)
     * @method Log make(array $attributes = [])
     * @method Log newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Log[]|_IH_Log_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Log[]|_IH_Log_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Log sole(array|string $columns = ['*'])
     * @method Log updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Log_QB extends _BaseBuilder {}
    
    /**
     * @method Role|null getOrPut($key, $value)
     * @method Role|$this shift(int $count = 1)
     * @method Role|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Role|$this pop(int $count = 1)
     * @method Role|null pull($key, $default = null)
     * @method Role|null last(callable $callback = null, $default = null)
     * @method Role|$this random(int|null $number = null)
     * @method Role|null sole($key = null, $operator = null, $value = null)
     * @method Role|null get($key, $default = null)
     * @method Role|null first(callable $callback = null, $default = null)
     * @method Role|null firstWhere(string $key, $operator = null, $value = null)
     * @method Role|null find($key, $default = null)
     * @method Role[] all()
     */
    class _IH_Role_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Role[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }
    
    /**
     * @method _IH_Role_QB whereId($value)
     * @method _IH_Role_QB whereName($value)
     * @method _IH_Role_QB whereCreatedAt($value)
     * @method _IH_Role_QB whereUpdatedAt($value)
     * @method Role baseSole(array|string $columns = ['*'])
     * @method Role create(array $attributes = [])
     * @method _IH_Role_C|Role[] cursor()
     * @method Role|null|_IH_Role_C|Role[] find($id, array $columns = ['*'])
     * @method _IH_Role_C|Role[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Role|_IH_Role_C|Role[] findOrFail($id, array $columns = ['*'])
     * @method Role|_IH_Role_C|Role[] findOrNew($id, array $columns = ['*'])
     * @method Role first(array|string $columns = ['*'])
     * @method Role firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Role firstOrCreate(array $attributes = [], array $values = [])
     * @method Role firstOrFail(array $columns = ['*'])
     * @method Role firstOrNew(array $attributes = [], array $values = [])
     * @method Role firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Role forceCreate(array $attributes)
     * @method _IH_Role_C|Role[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Role_C|Role[] get(array|string $columns = ['*'])
     * @method Role getModel()
     * @method Role[] getModels(array|string $columns = ['*'])
     * @method _IH_Role_C|Role[] hydrate(array $items)
     * @method Role make(array $attributes = [])
     * @method Role newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Role[]|_IH_Role_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Role[]|_IH_Role_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Role sole(array|string $columns = ['*'])
     * @method Role updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Role_QB extends _BaseBuilder {}
    
    /**
     * @method Tool|null getOrPut($key, $value)
     * @method Tool|$this shift(int $count = 1)
     * @method Tool|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Tool|$this pop(int $count = 1)
     * @method Tool|null pull($key, $default = null)
     * @method Tool|null last(callable $callback = null, $default = null)
     * @method Tool|$this random(int|null $number = null)
     * @method Tool|null sole($key = null, $operator = null, $value = null)
     * @method Tool|null get($key, $default = null)
     * @method Tool|null first(callable $callback = null, $default = null)
     * @method Tool|null firstWhere(string $key, $operator = null, $value = null)
     * @method Tool|null find($key, $default = null)
     * @method Tool[] all()
     */
    class _IH_Tool_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Tool[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }
    
    /**
     * @method _IH_Tool_QB whereId($value)
     * @method _IH_Tool_QB whereItem($value)
     * @method _IH_Tool_QB whereDescription($value)
     * @method _IH_Tool_QB whereGroupId($value)
     * @method _IH_Tool_QB whereFamilyId($value)
     * @method _IH_Tool_QB whereBrandId($value)
     * @method _IH_Tool_QB whereModel($value)
     * @method _IH_Tool_QB whereSerialNumber($value)
     * @method _IH_Tool_QB whereCalibrationExpiration($value)
     * @method _IH_Tool_QB whereDispatchable($value)
     * @method _IH_Tool_QB whereHasValidation($value)
     * @method _IH_Tool_QB whereMainLocalization($value)
     * @method _IH_Tool_QB whereShelfLocalization($value)
     * @method _IH_Tool_QB whereShelf($value)
     * @method _IH_Tool_QB whereMeasurement($value)
     * @method _IH_Tool_QB whereUserId($value)
     * @method _IH_Tool_QB whereMinStock($value)
     * @method _IH_Tool_QB whereQuantity($value)
     * @method _IH_Tool_QB whereCreatedAt($value)
     * @method _IH_Tool_QB whereUpdatedAt($value)
     * @method _IH_Tool_QB whereDeletedAt($value)
     * @method Tool baseSole(array|string $columns = ['*'])
     * @method Tool create(array $attributes = [])
     * @method _IH_Tool_C|Tool[] cursor()
     * @method Tool|null|_IH_Tool_C|Tool[] find($id, array $columns = ['*'])
     * @method _IH_Tool_C|Tool[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Tool|_IH_Tool_C|Tool[] findOrFail($id, array $columns = ['*'])
     * @method Tool|_IH_Tool_C|Tool[] findOrNew($id, array $columns = ['*'])
     * @method Tool first(array|string $columns = ['*'])
     * @method Tool firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Tool firstOrCreate(array $attributes = [], array $values = [])
     * @method Tool firstOrFail(array $columns = ['*'])
     * @method Tool firstOrNew(array $attributes = [], array $values = [])
     * @method Tool firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Tool forceCreate(array $attributes)
     * @method _IH_Tool_C|Tool[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Tool_C|Tool[] get(array|string $columns = ['*'])
     * @method Tool getModel()
     * @method Tool[] getModels(array|string $columns = ['*'])
     * @method _IH_Tool_C|Tool[] hydrate(array $items)
     * @method Tool make(array $attributes = [])
     * @method Tool newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Tool[]|_IH_Tool_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Tool[]|_IH_Tool_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Tool sole(array|string $columns = ['*'])
     * @method Tool updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Tool_QB extends _BaseBuilder {}
    
    /**
     * @method User|null getOrPut($key, $value)
     * @method User|$this shift(int $count = 1)
     * @method User|null firstOrFail($key = null, $operator = null, $value = null)
     * @method User|$this pop(int $count = 1)
     * @method User|null pull($key, $default = null)
     * @method User|null last(callable $callback = null, $default = null)
     * @method User|$this random(int|null $number = null)
     * @method User|null sole($key = null, $operator = null, $value = null)
     * @method User|null get($key, $default = null)
     * @method User|null first(callable $callback = null, $default = null)
     * @method User|null firstWhere(string $key, $operator = null, $value = null)
     * @method User|null find($key, $default = null)
     * @method User[] all()
     */
    class _IH_User_C extends _BaseCollection {
        /**
         * @param int $size
         * @return User[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }
    
    /**
     * @method _IH_User_QB whereId($value)
     * @method _IH_User_QB whereRoleId($value)
     * @method _IH_User_QB whereEmail($value)
     * @method _IH_User_QB wherePassword($value)
     * @method _IH_User_QB whereRememberToken($value)
     * @method _IH_User_QB whereCreatedAt($value)
     * @method _IH_User_QB whereUpdatedAt($value)
     * @method _IH_User_QB whereDeletedAt($value)
     * @method User baseSole(array|string $columns = ['*'])
     * @method User create(array $attributes = [])
     * @method _IH_User_C|User[] cursor()
     * @method User|null|_IH_User_C|User[] find($id, array $columns = ['*'])
     * @method _IH_User_C|User[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method User|_IH_User_C|User[] findOrFail($id, array $columns = ['*'])
     * @method User|_IH_User_C|User[] findOrNew($id, array $columns = ['*'])
     * @method User first(array|string $columns = ['*'])
     * @method User firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method User firstOrCreate(array $attributes = [], array $values = [])
     * @method User firstOrFail(array $columns = ['*'])
     * @method User firstOrNew(array $attributes = [], array $values = [])
     * @method User firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method User forceCreate(array $attributes)
     * @method _IH_User_C|User[] fromQuery(string $query, array $bindings = [])
     * @method _IH_User_C|User[] get(array|string $columns = ['*'])
     * @method User getModel()
     * @method User[] getModels(array|string $columns = ['*'])
     * @method _IH_User_C|User[] hydrate(array $items)
     * @method User make(array $attributes = [])
     * @method User newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|User[]|_IH_User_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|User[]|_IH_User_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method User sole(array|string $columns = ['*'])
     * @method User updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_User_QB extends _BaseBuilder {}
}