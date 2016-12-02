<?php
/* @var $gen llstarscreamll\Crud\Providers\TestsGenerator */
/* @var $fields [] */
/* @var $request Request */
/* @var $foreign_keys [] */
?>
<?='<?php'?>


<?= $gen->getClassCopyRightDocBlock() ?>


namespace <?= config('modules.crud.config.parent-app-namespace') ?>\Http\Controllers;

use Illuminate\Http\Request;
use <?= config('modules.crud.config.parent-app-namespace') ?>\Services\<?= $gen->modelClassName() ?>Service;
use <?= config('modules.crud.config.parent-app-namespace') ?>\Http\Requests\<?= $gen->modelClassName()."Request" ?>;
use <?= config('modules.crud.config.parent-app-namespace') ?>\Http\Controllers\Controller;

/**
 * Clase <?= $gen->controllerClassName()."\n" ?>
 *
 * @author <?= config('modules.crud.config.author') ?> <<?= config('modules.crud.config.author_email') ?>>
 */
class <?= $gen->controllerClassName() ?> extends Controller
{
    /**
     * El directorio donde están las vistas.
     *
     * @var String
     */
    private $viewsDir = "<?= $gen->viewsDirName() ?>";
    
    /**
     * @var <?= config('modules.crud.config.parent-app-namespace') ?>\Services\<?= $gen->modelClassName() ?>Service
     */
    private $<?= $gen->modelVariableName() ?>Service;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(<?= $gen->modelClassName() ?>Service $<?= $gen->modelVariableName() ?>Service)
    {
        // el usuario debe estar autenticado para acceder al controlador
        $this->middleware('auth');
        // el usuario debe tener permisos para acceder al controlador
        $this->middleware('<?= config("modules.crud.config.permissions-middleware") ?>', ['except' => ['store', 'update']]);
        $this-><?= $gen->modelVariableName() ?>Service = $<?= $gen->modelVariableName() ?>Service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param <?= config('modules.crud.config.parent-app-namespace') ?>\Http\Requests\<?= $gen->modelClassName()."Request" ?> $request
     *
     * @return Illuminate\Http\Response
     */
    public function index(<?= $gen->modelClassName()."Request" ?> $request)
    {
        $data = $this-><?= $gen->modelVariableName() ?>Service->getIndexTableData($request);
        $data['records'] = $this-><?= $gen->modelVariableName() ?>Service->indexSearch($request);

        return $this->view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this-><?= $gen->modelVariableName() ?>Service->getCreateFormData();
        return $this->view('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  <?= config('modules.crud.config.parent-app-namespace') ?>\Http\Requests\<?= $gen->modelClassName()."Request" ?>  $request
     *
     * @return Illuminate\Http\Response
     */
    public function store(<?= $gen->modelClassName()."Request" ?> $request)
    {
        $this-><?= $gen->modelVariableName() ?>Service->store($request);
        return redirect()->route('<?= $gen->route().'.index' ?>');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $data = $this-><?= $gen->modelVariableName() ?>Service->getShowFormData($id);
        return $this->view('show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data = $this-><?= $gen->modelVariableName() ?>Service->getEditFormData($id);
        return $this->view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param <?= config('modules.crud.config.parent-app-namespace') ?>\Http\Requests\<?= $gen->modelClassName()."Request" ?> $request
     *
     * @return Illuminate\Http\Response
     */
    public function update(int $id, <?= $gen->modelClassName()."Request" ?> $request)
    {
        $this-><?= $gen->modelVariableName() ?>Service->update($id, $request);
        
        if ($request->isXmlHttpRequest()) {
            return response('ok!!', 204);
        }

        return redirect()->route('<?= $gen->route().'.index' ?>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param <?= config('modules.crud.config.parent-app-namespace') ?>\Http\Requests\<?= $gen->modelClassName()."Request" ?> $request
     *
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id, <?= $gen->modelClassName()."Request" ?> $request)
    {
        $this-><?= $gen->modelVariableName() ?>Service->destroy($id, $request);
        return redirect()->route('<?= $gen->route().'.index' ?>');
    }

<?php if ($gen->hasDeletedAtColumn($fields)) { ?>
    /**
     * Restore the specified resource from storage.
     *
     * @param int $id
     * @param <?= config('modules.crud.config.parent-app-namespace') ?>\Http\Requests\<?= $gen->modelClassName()."Request" ?> $request
     *
     * @return Illuminate\Http\Response
     */
    public function restore(int $id, <?= $gen->modelClassName()."Request" ?> $request)
    {
        $this-><?= $gen->modelVariableName() ?>Service->restore($id, $request);
        return redirect()->route('<?= $gen->route().'.index' ?>');
    }
<?php } ?>
    
    /**
     * Devuelve la vista con los respectivos datos.
     *
     * @param string $view
     * @param array  $data
     *
     * @return Illuminate\Http\Response
     */
    protected function view(string $view, array $data = [])
    {
        return view($this->viewsDir.'.'.$view, $data);
    }
}
