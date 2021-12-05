@extends('layouts.master')
@section('title','Quantity Release')

@section('content')
    <div class="card mt-3 p-4 shadow-sm">
        <div class="table-responsive">
        <a href="{{ route('QuantityRelease.index') }}" class="btn btn-success">Kembali</a>
        <table class="mt-4 table table-bordered table-md table-hover bg-white text-center">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Variant</th>
                    <th>Reject + Defect Inspeksi</th>
                    <th>Reject + Defect Inspeksi HCI</th>
                    <th>QC Finish Good</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tampil as $no => $data_table)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td>@foreach ($poproduksi->where('id',$data_table->id_product) as $poproduksinya)
                                    @foreach ($varian->where('id',$poproduksinya->id_varian) as $item)
                                        <a href="{{route('poproduksi.show',$data_table->id_product)}}"> {{$item->kode_variant }} {{$item->ukuran}}</a>
                                    @endforeach    
                                @endforeach</td>
                            <td>{{$data_table->reject_defect_inspeksi}}</td>
                            <td>{{$data_table->reject_defect_inspeksi_hci}}</td>
                            <td>
                            <?php
                                if (isset($finish_good[$data_table->id_product])) {
                                    $finish_good_quantity = $finish_good[$data_table->id_product]->sum();
                                } else {
                                    $finish_good_quantity = 0;
                                }

                                // dd($finish_good_quantity,$data_table->reject_defect_inspeksi,$data_table->reject_defect_inspeksi_hci);
                                $qc_finish_good= $finish_good_quantity - $data_table->reject_defect_inspeksi - $data_table->reject_defect_inspeksi_hci;
                                echo "$qc_finish_good";
                            ?>
                            </td>
                        </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

@endsection

