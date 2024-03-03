<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditLog;
use App\Models\Code;

class AuditLogController extends Controller
{
    public function index()
    {
        $auditLogs = AuditLog::latest()->get()->sortByDesc('id');
        return view('admin.audit', compact('auditLogs'));
    }
}
