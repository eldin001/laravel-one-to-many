<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('project_images', $name);
            $form_data['image'] = $path;
            Project::create($request->all());
            return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo');
        }
        return redirect()->route('admin.projects.create')->with('error', 'Immagine non trovata');
    }

    public function show(Project $project) {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project) {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project) {
        $project->update($request->all());
        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo');
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto cancellato con successo');
    }
}