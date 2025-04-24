@extends('layouts.admin')

@section('title', 'Manajemen Pendaftaran Siswa')

@section('styles')
<style>
    .wizard-steps {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
        position: relative;
    }
    
    .wizard-steps::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 11%;
        right: 11%;
        height: 2px;
        background: #e9ecef;
        z-index: 0;
    }
    
    .wizard-step {
        position: relative;
        z-index: 1;
        text-align: center;
        width: 25%;
    }
    
    .wizard-step-number {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #e9ecef;
        color: #6c757d;
        font-weight: bold;
        margin: 0 auto 10px;
        transition: all 0.3s;
    }
    
    .wizard-step.active .wizard-step-number {
        background-color: #4e73df;
        color: white;
    }
    
    .wizard-step.completed .wizard-step-number {
        background-color: #1cc88a;
        color: white;
    }
    
    .wizard-step-label {
        font-size: 0.85rem;
        color: #6c757d;
        font-weight: 500;
    }
    
    .wizard-step.active .wizard-step-label {
        color: #4e73df;
        font-weight: 600;
    }
    
    .wizard-step.completed .wizard-step-label {
        color: #1cc88a;
        font-weight: 600;
    }
    
    .wizard-content {
        background: white;
        border-radius: 0.5rem;
        padding: 2rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }
    
    .wizard-nav {
        display: flex;
        justify-content: space-between;
        margin-top: 2rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d3e2;
    }
    
    .form-control:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    .form-select {
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d3e2;
    }
    
    .form-select:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
</style>
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pendaftaran Siswa</h1>
    <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Pendaftaran: {{ $siswa->nama_lengkap }}</h6>
    </div>
    <div class="card-body p-0 pt-4">
        <div class="wizard-steps">
            <div class="wizard-step {{ $currentStep == 1 ? 'active' : ($currentStep > 1 ? 'completed' : '') }}">
                <div class="wizard-step-number">
                    @if($currentStep > 1)
                        <i class="fas fa-check"></i>
                    @else
                        1
                    @endif
                </div>
                <div class="wizard-step-label">Data Siswa</div>
            </div>
            <div class="wizard-step {{ $currentStep == 2 ? 'active' : ($currentStep > 2 ? 'completed' : '') }}">
                <div class="wizard-step-number">
                    @if($currentStep > 2)
                        <i class="fas fa-check"></i>
                    @else
                        2
                    @endif
                </div>
                <div class="wizard-step-label">Jalur Pendaftaran</div>
            </div>
            <div class="wizard-step {{ $currentStep == 3 ? 'active' : ($currentStep > 3 ? 'completed' : '') }}">
                <div class="wizard-step-number">
                    @if($currentStep > 3)
                        <i class="fas fa-check"></i>
                    @else
                        3
                    @endif
                </div>
                <div class="wizard-step-label">Data Orang Tua/Wali</div>
            </div>
            <div class="wizard-step {{ $currentStep == 4 ? 'active' : '' }}">
                <div class="wizard-step-number">4</div>
                <div class="wizard-step-label">Konfirmasi</div>
            </div>
        </div>
        
        <div class="wizard-content">
            @include("admin.siswa.pendaftaran.step{$currentStep}")
        </div>
    </div>
</div>
@endsection 