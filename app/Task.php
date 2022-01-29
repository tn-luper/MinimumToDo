<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    
    protected $fillable = [
        'date',
        'task_name',
        'start_time',
        'bare_minimum',
        'target_amount',
        'plan',
        'user_id',
    ];
    
    protected $dates = [
        'date'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function getactive()
    {
        return $this->where('user_id', Auth::user()->id)->where('status', 0)->get();
    }
    
    public function getpast(int $limit_count = 10)
    {
        return $this->where('user_id', Auth::user()->id)->where('status', '!=', 0)
        ->orderBy('date', 'DESC')->paginate($limit_count);
    }
    
    public function countactive()
    {
        return $this->where('user_id', Auth::user()->id)->where('status', 0)->count();
    }
    
    // public function getpastbymonth()
    // {
    //     return $this
    //         ->where('user_id', Auth::user()->id)->where('status', '!=', 0)
    //         ->orderBy('date', 'DESC')
    //         ->get()
    //         ->groupBy(function ($row) {
    //             return $row->date->format('Y-m');
    //             });
    // }
    
    // public function getstatus1bymonth()
    // {
    //     return $this
    //         ->where('user_id', Auth::user()->id)->where('status', 1)
    //         ->orderBy('date', 'DESC')
    //         ->get()
    //         ->groupBy(function ($row) {
    //             return $row->date->format('Y-m');
    //             });
    // }
    
    // public function getstatus2bymonth()
    // {
    //     return $this
    //         ->where('user_id', Auth::user()->id)->where('status', 2)
    //         ->orderBy('date', 'DESC')
    //         ->get()
    //         ->groupBy(function ($row) {
    //             return $row->date->format('Y-m');
    //             });
    // }
    
    // public function getstatus3bymonth()
    // {
    //     return $this
    //         ->where('user_id', Auth::user()->id)->where('status', 3)
    //         ->orderBy('date', 'DESC')
    //         ->get()
    //         ->groupBy(function ($row) {
    //             return $row->date->format('Y-m');
    //             });
    // }


}
