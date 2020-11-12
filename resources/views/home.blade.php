@extends('layouts.master')
@section('tittle')
    Home Page
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item">Home</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
<?php
    $barang = DB::select('select * from barangs');
    $keluar = DB::select('select * from bkeluars');
    $masuk = DB::select('select * from bmasuks');
    $karyawan = DB::select('select * from karyawans');
    $tbarang = count($barang);
    $tkeluar = count($keluar);
    $tmasuk = count($masuk);
    $tkaryawan = count($karyawan);
?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-white">
                <div class="inner">
                  <h3>{{$tkaryawan}}</h3>

                  <p>Karyawan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-people text-blue"></i>
                </div>
                <a href="{{ url('karyawan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-white">
                <div class="inner">
                  <h3>{{$tbarang}}</h3>
                  <p>Barang Terdaftar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-filing text-dark"></i>
                </div>
                <a href="{{ url('barang')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-white">
                <div class="inner">
                  <h3>{{$tkeluar}}</h3>
                  <p>Transaksi Barang Keluar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-upload text-red"></i>
                </div>
                <a href="{{ url('bkeluar')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-white">
                <div class="inner">
                  <h3>{{$tmasuk}}</h3>
                  <p>Transaksi Barang Masuk</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-download text-green"></i>
                </div>
                <a href="{{ url('bmasuk')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
