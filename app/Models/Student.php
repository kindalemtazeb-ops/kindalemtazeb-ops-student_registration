<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ለሎጊን የሚያስፈልገው ይሄ ነው
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mass Assignment - ዳታቤዝ ውስጥ እንዲገቡ የተፈቀዱ መረጃዎች
     */
    protected $fillable = [
        'student_id',
        'full_name',
        'email',
        'password',
        'national_id',
        'department',
        'gpa',
    ];

    /**
     * Primary Key ማስተካከያ
     */
    protected $primaryKey = 'student_id';
    public $incrementing = false; // በራሱ ቁጥር እንዲጨምር አንፈልግም
    protected $keyType = 'int';   // የተማሪው መለያ ቁጥር ስለሆነ

    /**
     * ለሎጊን የሚደበቁ መረጃዎች
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
