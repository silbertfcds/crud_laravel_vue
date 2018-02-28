<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Path\To\DOMDocument;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get();

        return $tasks;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $this->validade($request, [
            'keep' => 'required'
        ]);*/

        $task = Task::create([
            'keep' => $request->input('keep')
        ]);

        return response()->json([
            'message' => 'task cadastrado com sucesso',
            'task' => $task
        ]);
    }

    public function pegarUrl(){
        
        $url = file_get_contents('http://esaj.tjrn.jus.br/cjosg/index.jsp?tpClasse=J&deEmenta=roubo&clDocumento=&nuProcesso=&deClasse=&cdClasse=&deOrgaoJulgador=&cdOrgaoJulgador=&nmRelator=&cdRelator=&dtInicio=&dtTermino=&cdOrigemDoc=0&Submit=Pesquisar&Origem=1&rbCriterioEmenta=TODAS&rbCriterioBuscaLivre=TODAS');
       /* preg_match_all( '/<td class="textopreto">([^<]++)/', $url, $conteudo);
        $exibir = $conteudo[0][0];*/
        //retira todas as tags html do texto
        /*$texto = strip_tags($url);*/

        //retira uma tag especifica do texto
        /*$str = preg_replace('@<table[^>]*?>.*?</table\s*>@si', '', $url);*/
       
        $dom = new \DOMDocument;

        $dom->loadHTML("<html><body>Test<br></body></html>");

        $tables = $dom->getElementsByTagName('body');

        foreach ($tables as $table) {
            echo $table->nodeValue, PHP_EOL;
        }
        
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* $this->validate($request, [
            'nome' => 'required',
            'numero' => 'required'
        ]);*/
        
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json([
            'message' => 'produto updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
