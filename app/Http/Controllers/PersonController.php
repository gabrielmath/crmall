<?php

namespace App\Http\Controllers;

use Kris\LaravelFormBuilder\Form;
use App\Forms\PersonForm;
use App\Models\Person;
//use Form;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /** @var Person $pessoas */
    private $pessoas;

    public function __construct(Person $person)
    {
        $this->pessoas = $person;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = $this->pessoas::paginate();
        return view('person.index',compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** @var Form $form */
        $form = \FormBuilder::create(PersonForm::class,[
            'url' => route('person.store'),
            'method' => 'POST'
        ]);

        return view('person.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(PersonForm::class);
        if(!$form->isValid())
        {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getFieldValues();
        $this->pessoas::create($data);
        $request->session()->flash('message-success', "Pessoa cadastrada com sucesso!");
        return redirect()->route('person.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(PersonForm::class,[
            'url' => route('person.update', ['person' => $person->id]),
            'method' => 'PUT',
            'model' => $person
        ]);

        return view('person.edit', compact('form','person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(PersonForm::class,[
            'data' => ['id' => $person->id]
        ]);
        if(!$form->isValid())
        {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $person->update($data);
        $request->session()->flash('message-success', 'Cadastro editado com sucesso!');
        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person $person
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Person $person)
    {
        $pessoa = $person->name;
        $person->delete();
        session()->flash('message-success', "O cadastro <strong>{$pessoa}</strong> foi excluído com sucesso!");
        return redirect()->route('person.index');
    }
}
