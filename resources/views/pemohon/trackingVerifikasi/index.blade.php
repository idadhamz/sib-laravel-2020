@extends('layouts.master')

        @section('content')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
              <div class="section-header">
                    <!-- <h1>Data Akun</h1> -->
                    <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="{{url('/trackingVerifikasi/index')}}">Upload Berkas</a></div>
                  </div>
              </div>

              @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                    </button>
                    {{ session()->get('message') }}
                  </div>
                </div>
              @endif
              @if(session()->has('message_edit'))
                <div class="alert alert-warning alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                    </button>
                    {{ session()->get('message_edit') }}
                  </div>
                </div>
              @endif
              @if(session()->has('message_delete'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                    </button>
                    {{ session()->get('message_delete') }}
                  </div>
                </div>
              @endif

              <div class="alert alert-primary alert-has-icon mt-4">
                  <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                  <div class="alert-body">
                          <div class="alert-title">Informasi Status Verifikasi</div>
                  </div>
              </div>

              <div class="section-body">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Tracking Verifikasi</h4>
                    </div>
                    <div class="card-body">
                        <div style="margin:0px 0px 10px 0px;"> 
                            <a href="{{url('/trackingVerifikasi/index')}}"class="btn btn-outline-primary" style="font-weight: bold;font-size: 13px;border-radius: 0px;border-width: 1.5px;">Muat Ulang</a>
                        </div>
                        <hr/>
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-md" id="data-pemohon">
                            <thead style="background-color: #95b9c7;">
                                  <tr>
                                    <th style="color: white;">No</th>
                                    <th style="color: white;">NIP</th>
                                    <th style="color: white;">Nama Pemohon</th>
                                    <th style="color: white;">Pemeriksa Permohonan</th>
                                    <th style="color: white;width: 200px;">Status</th>
                                    <th style="color: white;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_tracking as $index => $row)
                                <tr>
                                    <td style="color: #000000;">{{$index +1}}</td>
                                    <td style="color: #000000;">{{$row->nip}}</td>
                                    <td style="color: #000000;">{{$row->nama}}</td>
                                    <td style="color: #000000;">{{$row->name}}</td>
                                    <td>
                                    @if( $row->id_status == 1 )
                                    <span style="font-weight: bold;color: blue;"><i class="fas fa-check-circle" style="font-size: 15px; margin-right: 5px;margin-bottom: 10px;color: blue;"></i>Permohonan Disetujui</span>
                                    @elseif( $row->id_status == 2 )
                                    <span style="font-weight: bold; color: red;"><i class="fas fa-times-circle" style="font-size: 15px; margin-right: 5px;margin-bottom: 10px;color: red;"></i>Permohonan Ditolak</span>
                                    @elseif( $row->id_status == 3 )
                                    <span style="font-weight: bold; color: purple;"><i class="fas fa-spinner fa-pulse" style="font-size: 15px; margin-right: 5px;margin-bottom: 10px;color: purple;"></i>Permohonan Sedang Diproses</span>
                                    @endif
                                    <br>
                                    <span class="text-small text-muted" style="font-size: 12px;">
                                      @if( $row->id_status == 1 )
                                      Tunggu hingga IDP telah diterbitkan, terima kasih.
                                      @elseif( $row->id_status == 2 )
                                      Periksa kembali data diri dan berkas permohonan.
                                      @elseif( $row->id_status == 3 )
                                      Sedang diproses, tunggu hinga 2 - 4 hari kerja untuk menjadi surat permohonan surat belajar.
                                      @endif
                                    </span>
                                    </td>
                                    <td style="color: #000000;">{{$row->keterangan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
              </div>
            </section>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- End Row -->
@endsection