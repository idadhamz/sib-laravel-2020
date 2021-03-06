@extends('layouts.master')

        @section('content')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
              <div class="section-header">
                    <!-- <h1>Data Akun</h1> -->
                    <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="{{url('/uploadBerkas/index')}}">Upload Berkas</a></div>
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
                          <div class="alert-title">Informasi Upload Berkas</div>
                          <p><u>Apabila Berkas Serupa</u>, Berkas yang sudah diupload <strong>tidak perlu diupload ulang!!</strong></p>
                  </div>
              </div>

              <div class="section-body">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Pilih Pemohon</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-md" id="data-pemohon">
                            <thead style="background-color: #95b9c7;">
                                  <tr>
                                    <th style="color: white;">No</th>
                                    <th style="color: white;">NIP</th>
                                    <th style="color: white;">Nama Lengkap</th>
                                    <th style="color: white;">Tempat Tanggal Lahir</th>
                                    <!-- <th style="color: white;">Alamat</th> -->
                                    <th style="color: white;width: 150px;">Unit Kerja</th>
                                    <th style="color: white;">Jabatan</th>
                                    <!-- <th style="color: white;">Pangkat</th>
                                    <th style="color: white;">Jenjang Pendidikan</th> -->
                                    <!-- <th style="color: white;">Jurusan</th>
                                    <th style="color: white;">Universitas</th> -->
                                    <!-- <th style="color: white;">Tanggal Mulai</th>
                                    <th style="color: white;">Tanggal Berakhir</th>
                                    <th style="color: white;">Beasiswa</th>
                                    <th style="color: white;">Lama Waktu Perpanjangan</th> -->
                                    <th style="color: white;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_diri_pemohon as $index => $row)
                                <tr>
                                    <td style="color: #000000;">{{$index +1}}</td>
                                    <td style="color: #000000;">{{$row->nip}}</td>
                                    <td style="color: #000000;">{{$row->nama}}</td>
                                    <td style="color: #000000;"><span style="color: #000000;">{{$row->tempat_lahir}}</span> <br>
                                        <span style="color: #000000;">{{ Carbon\Carbon::parse($row->tgl_lahir)->formatLocalized('%d %B %Y') }}</span>
                                    </td>
                                    <!-- <td style="color: #000000;">{{$row->alamat}}</td> -->
                                    <td style="color: #000000;">{{$row->unit_kerja}}</td>
                                    <td style="color: #000000;">{{$row->jabatan}}</td>
                                    <!-- <td style="color: #000000;">{{$row->pangkat}}</td>
                                    <td style="color: #000000;">{{$row->jenjang_pend}}</td> -->
                                    <!-- <td style="color: #000000;">{{$row->jurusan}}</td>
                                    <td style="color: #000000;">{{$row->univ}}</td> -->
                                    <!-- <td style="color: #000000;">{{$row->tgl_mulai}}</td>
                                    <td style="color: #000000;">{{$row->tgl_akhir}}</td>
                                    <td style="color: #000000;">{{$row->beasiswa}}</td>
                                    <td style="color: #000000;">{{$row->jml_wkt_perp}}</td> -->
                                    <td>
                                        <a href="/uploadBerkas/upload/{{ $row->id_pemohon }}" class="btn btn-outline-primary" style="font-weight: bold;font-size: 13px;border-radius: 0px;border-width: 1.5px;"><i class="fas fa-upload"></i></a>
                                        <a href="/uploadBerkas/view/{{ $row->id_pemohon }}" class="btn btn-outline-info" style="font-weight: bold;font-size: 13px;border-radius: 0px;border-width: 1.5px;"><i class="fas fa-eye"></i></a>
                                    </td>
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