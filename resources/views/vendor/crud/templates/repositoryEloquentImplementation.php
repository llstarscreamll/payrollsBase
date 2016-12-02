<?php
/* @var $gen llstarscreamll\Crud\Providers\TestsGenerator */
/* @var $fields [] */
/* @var $request Request */
?>
<?='<?php'?>


<?= $gen->getClassCopyRightDocBlock() ?>


namespace <?= config('modules.crud.config.parent-app-namespace') ?>\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use <?= config('modules.crud.config.parent-app-namespace') ?>\Repositories\Contracts\<?= $gen->modelClassName() ?>Repository;
use <?= config('modules.crud.config.parent-app-namespace') ?>\Models\<?= $gen->modelClassName() ?>;
use <?= config('modules.crud.config.parent-app-namespace') ?>\Repositories\Criterias\<?= $gen->getRepositoryCriteriaName() ?>;
use Illuminate\Support\Collection;

/**
 * Class <?= $gen->modelClassName()."EloquentRepository\n" ?>
 *
 * @author <?= config('modules.crud.config.author') ?> <<?= config('modules.crud.config.author_email') ?>>
 */
class <?= $gen->modelClassName() ?>EloquentRepository extends BaseRepository implements <?= $gen->modelClassName() ?>Repository
{
    /**
     * Los atributos por los que se puede realizar búsquedas.
     *
     * @var array
     */
    protected $fieldSearchable = [
<?php foreach ($fields as $field) { ?>
<?php if (!$field->hidden) { ?>
        '<?= $field->name ?>',
<?php } ?>
<?php } ?>
    ];

    /**
     * Especifíca el modelo Eloquent a usar.
     *
     * @return <?= config('modules.crud.config.parent-app-namespace') ?>\Models\<?= $gen->modelClassName()."\n" ?>
     */
    public function model()
    {
        return <?= $gen->modelClassName() ?>::class;
    }

    /**
     * Consulta los datos que le usuario indique del modelo.
     *
     * @param  Collection $request El input del usuario.
     * @param  array      $columns Las columnas a selecciondar de la tabla.
     * @param  int        $rows    Las filas a mostrar por página.
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getRequested(Collection $request, array $columns = ['*'], int $rows = 15)
    {
        return $this->pushCriteria(new <?= $gen->getRepositoryCriteriaName() ?>($request))
        ->paginate($rows, $columns);
    }

    /**
     * Obtiene lista de datos con las columnas indicadas en $key y $name,
     * generalmente para ser usadas en selects de formularios.
     *
     * @param  string $key   Nombre de columna que va a ser indice del array.
     * @param  string $name  Nombre de columna que será el valor del indice del array.
     *
     * @return array
     */
    public function getSelectList(string $key = 'id', string $name = 'name')
    {
        return $this->model->pluck($name, $key)->all();
    }

    /**
     * Obtiene los posible valores de una columna de tipo enum.
     *
     * @param  string $column  El nombre de la columna.
     *
     * @return array
     */
    public function getEnumValuesArray(string $column)
    {
        return $this->model->getEnumValuesArray($column);
    }

    /**
     * Obtiene los posibles valores de una columna de tipo enum en forma de
     * lista array con sus valores traducidos.
     *
     * @param  string $column  El nombre de la columna.
     *
     * @return array
     */
    public function getEnumFieldSelectList(string $column)
    {
        return collect($this->getEnumValuesArray($column))
            ->map(function ($item, $key) {
                return $item = trans('<?= $gen->modelVariableName() ?>.form-labels.status_values.'.$item);
            })->all();
    }

    /**
     * <?= $gen->getDestroyBtnTxt() ?> uno o varios registros.
     *
     * @param  array|int $ids Array de ids o un único id.
     *
     * @return int
     */
    public function destroy($ids)
    {
        return $this->model->destroy($ids);
    }
<?php if ($gen->hasDeletedAtColumn($fields)) { ?>

    /**
     * Restaura de papelera uno o varios registros.
     *
     * @param  array|int $ids Array de ids o un único id.
     *
     * @return int
     */
    public function restore($ids)
    {
        return $this->model->whereIn('id', $ids)->restore($ids);
    }
<?php } ?>
}
