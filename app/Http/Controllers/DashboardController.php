<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        
        $users = User::where('role_as', '0')->get();
        return view('admin.users.index', compact('users'));
    }

    public function viewuser($id)
    {
        $users = User::find($id);
        return view('admin.users.view',compact('users'));
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
       return redirect('users');
    }
}
