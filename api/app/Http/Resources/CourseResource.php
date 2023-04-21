<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ModuleCollection;
use App\Models\CourseModule;
use App\Models\Module;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'courseId' => $this->course_id,
            'name' => $this->name,
            'modules' => $this->getModules($this->course_id),
        );
    }

    public function getModules($id)
    {
        $courseModules = CourseModule::where('course_id', $id)->get();
        $modules = collect();

        foreach ($courseModules as $module) {
            // $modules = Module::where('module_id', $courseModule->module_id)->get();
            $modules->push(new ModuleResource(Module::where('module_id', $module->module_id)->get()[0]));
        }

        return $modules;
    }
}