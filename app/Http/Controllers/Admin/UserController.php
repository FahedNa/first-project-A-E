<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::query()
            ->orderBy('name')
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    // عرض نموذج تعديل المستخدم
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // حفظ التعديلات
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update($validated);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'تم تعديل بيانات المستخدم بنجاح.');
    }


}
