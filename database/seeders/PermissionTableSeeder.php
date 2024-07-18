<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
        
    $permissions = [
        'الرئيسية',
        'القسم',
        'اضافة قسم',
        'تعديل قسم',
        'حدف قسم',
        'عرض السعر',
        'اضافة سعر',
        'تعديل سعر',
        'حذف سعر',
        'الفريق',
        'اضافة كابتن',
        'تعديل كابتن',
        'حذف كابتن',
        'اراء العملاء',
        'حذف اراء العملاء',
        'حذف مشاكل المستخدمين',
        'وقت الاشتراك',
        'اضافة وقت',
        'حذف وقت',
        'الصور',
        'اضافة صورة',
        'تعديل صورة',
        'حذف صورة',
        'مواعيد الالعاب',
        'اضافة معاد',
        'تعديل معاد',
        'حذف معاد',
        'الاوردرات',
        'قبول الاوردر',
        'رفض الاوردر',
        'حذف الاوردر',
        'صلاحيات المستخدمين',
        'اضافة صلاحية',
        'تعديل صلاحية',
        'حذف صلاحية',
        'المطورون',
        'اضافة مطور',
        'تعديل مطور',
        'حذف مطور',
    
    ];
  
  
  foreach ($permissions as $permission) {
  Permission::create(['name' => $permission]);
  }
  }
  }
  