<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $panel;

    /**
     * PageController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->panel = maelstrom(Page::class);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return $this->panel->index('admin/index');
/*            ->with('columns', [
                [
                    'label' => 'Name',
                    'name' => 'colour',
                    'sortable' => true,
                    'type' => 'EditLinkColumn',
                    'searchable' => true,
                ],
                [
                    'label' => 'Category',
                    'name' => 'category.name',
                    'filterMultiple' => false,
                    'filters' => Category::all()->map(function ($category) {
                        return [
                            'text' => $category->name,
                            'value' => $category->id
                        ];
                    })
                ],
        ]); */
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return $this->panel->create('admin.pages-form');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \ReflectionException
     */
    public function store()
    {
        $this->panel->store('Success message here!');

        return $this->panel->redirect('edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return redirect()->route('pages.edit', $page);
    }

    /**
     * @param Page $page
     * @return \Illuminate\View\View
     */
    public function edit(Page $page)
    {
        $this->panel->setEntry($page);

        return $this->panel->edit('admin.pages-form');
    }

    /**
     * @param Request $request
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \ReflectionException
     */
    public function update(Request $request, Page $page)
    {
        $this->panel->setEntry($page);
        $this->panel->update('Success message here!');

        return $this->panel->redirect('edit');
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $this->panel->setEntry($page);
        $this->panel->destroy('Success message!');

        return $this->panel->redirect('index');
    }
}
