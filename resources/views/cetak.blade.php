<x-layouts.print>
    <div class="font-serif leading-tight text-sm p-2">
        <div>
            @if ($setting->kop_surat)
            <div>
                <img src="{{ asset('storage/' . $setting->kop_surat) }}" />
            </div>
            @endif

            <div class="space-y-3 mt-3">
              <h1 class="font-bold italic text-center">STANDING INSTRUCTION</h1>

              <div>
                <div class="flex flex-row">
                  <div class="w-[100px]">Nomor</div>
                  <div>: {{ $instruction->nomor }}{{ $setting->nomor_surat }}</div>
                </div>
                <div class="flex flex-row">
                  <div class="w-[100px]">Lampiran</div>
                  <div>: {{ $instruction->lampiran }} {{ $instruction->lampiran > 0 ? 'lembar' : '-' }}</div>
                </div>
                <div class="flex flex-row">
                  <div class="w-[100px]">Perihal</div>
                  <div>: {{ $instruction->perihal }}</div>
                </div>
              </div>

              <div>
                <div>Kepada Yth,</div>
                <div class="ml-[110px]">
                    <div>{{ $instruction->bankTujuan->nama }}</div>
                    <div>{{ $instruction->bankTujuan->alamat }}</div>
                    <div>di Tempat</div>
                </div>
              </div>

              <div>
                <p>Yang bertanda tangan di bawah ini :</p>
              </div>

              <div>
                <div class="flex flex-row gap-1">
                    <div class="w-[180px]">Nama Lengkap</div>
                    <div>:</div>
                    <div class="w-[300px]">
                        <div>1. <span class="font-bold">{{$setting->nama_kepala_sekolah}}</span></div>
                        <div>2. <span class="font-bold">{{$setting->nama_bendahara}}</span></div>
                    </div>
                    <div>
                        <div>(Kepala Sekolah)</div>
                        <div>(Bendahara)</div>
                    </div>
                </div>
                <div class="flex flex-row gap-1">
                    <div class="w-[180px]">NIK</div>
                    <div>:</div>
                    <div class="w-[300px]">
                        <div>1. {{$setting->nik_kepala_sekolah}}</div>
                        <div>2. {{$setting->nik_bendahara}}</div>
                    </div>
                    <div>
                        <div>(Kepala Sekolah)</div>
                        <div>(Bendahara)</div>
                    </div>
                </div>
                <div class="flex flex-row gap-1">
                  <div class="w-[180px]">No. Handphone</div>
                  <div>:</div>
                  <div class="w-[300px]">
                    <div>1. {{$setting->hp_kepala_sekolah}}</div>
                    <div>2. {{$setting->hp_bendahara}}</div>
                  </div>
                  <div>
                    <div>(Kepala Sekolah)</div>
                    <div>(Bendahara)</div>
                  </div>
                </div>
              </div>

              <div>
                <div class="flex flex-row gap-1">
                  <div class="w-[300px]">Nomor Rekening Sumber Dana</div>
                  <div>:</div>
                  <div class="font-bold flex-1">{{ $instruction->bankSumber->nomor_rekening }}</div>
                </div>
                <div class="flex flex-row gap-1">
                  <div class="w-[300px]">Atas Nama Rekening</div>
                  <div>:</div>
                  <div class="font-bold flex-1">{{ $instruction->bankSumber->nama }}</div>
                </div>
                <div class="flex flex-row gap-1">
                  <div class="w-[300px]">Tujuan Penggunaan Dana</div>
                  <div>:</div>
                  <div class="flex-1">
                    @foreach ($tujuanItems as $item)
                        <div class="flex flex-row gap-1">
                            <div class="w-[250px]">{{ $item['nama_tujuan'] }}</div>
                            <div>{{ $item['kode_rekening'] }}</div>
                        </div>
                    @endforeach
                  </div>
                </div>
              </div>

              <div>
                <p>Mohon agar dilakukan pemindahbukuan/transfer dana dari rekening kami tersebut di atas sebagai berikut :</p>
              </div>

              <div>
                <div class="flex flex-row gap-1">
                  <div class="w-[180px]">Jumlah Dana</div>
                  <div>:</div>
                  <div class="font-bold">{{ \App\Support\FormatCurrency::idr($instruction->jumlah) }}</div>
                </div>
                <div class="flex flex-row gap-1">
                  <div class="w-[180px]">Terbilang</div>
                  <div>:</div>
                  <div class="capitalize italic">{{ Number::spell($instruction->jumlah, locale: 'id') }} rupiah</div>
                </div>
                <div class="flex flex-row gap-1">
                  <div class="w-[180px]">Rekening Penerima</div>
                  <div>:</div>
                  <div>terlampir</div>
                </div>
                <div class="flex flex-row gap-1">
                  <div class="w-[180px]">Atas Nama</div>
                  <div>:</div>
                  <div>terlampir</div>
                </div>
              </div>

              <div>
                <p>Dengan adanya <span class="italic">Standing Instruction</span> ini, maka:</p>
                <ol class="list-decimal list-outside ml-12">
                  <li>Bank dibebaskan dari segala akibat yang mungkin timbul dari pelaksanaan pemindahbukuan berdasarkan <span class="italic">Standing Instruction</span> ini;</li>
                  <li>Kami meyakini atas kebenaran data dan informasi pada <span class="italic">Standing Instruction</span> ini.</li>
                </ol>
              </div>

            <div>
                <p>Demikian <span class="italic">Standing Instruction</span> ini kami buat untuk dipergunakan sebagaimana mestinya.</p>
                <div class="flex flex-row justify-center gap-12">
                    <div>
                        <div class="mt-6">Mengetahui,</div>
                        <div>Kepala Sekolah</div>
                        <div>Kuasa Pengguna Anggaran</div>
                        <div class="mt-24">{{$setting->nama_kepala_sekolah}}</div>
                        <div>NIP. {{$setting->nip_kepala_sekolah}}</div>
                    </div>
                    <div>
                        <div>{{ $setting->tempat }}, {{ $instruction->tanggal->translatedFormat('d F Y') }}</div>
                        <div class="mt-6">Bendahara</div>
                        <div>Pengeluaran Pembantu,</div>
                        <div class="mt-24">{{$setting->nama_bendahara}}</div>
                        <div>NIP. {{$setting->nip_bendahara}}</div>
                    </div>
                </div>
              </div>
            </div>

        </div>

        <div class="pagebreak"></div>

        <div class="space-y-6">
          <div>
            <div class="flex flex-row gap-1">
                <div class="w-[100px]">Lampiran No</div>
                <div>:</div>
                <div>{{ $instruction->nomor . $setting->nomor_surat }}</div>
              </div>
              <div class="flex flex-row gap-1">
                <div class="w-[100px]">Perihal</div>
                <div>:</div>
                <div>{{ $instruction->perihal }}</div>
              </div>
          </div>

          <div>
            <div class="text-center font-bold">DAFTAR TRANSFER BELANJA BOSP TAHUN {{$instruction->tahun}}</div>
            <div class="mt-3">
              <table class="border-collapse border border-black">
                <thead>
                    <tr>
                        <td class="border border-black p-1 text-center">No</td>
                        <td class="border border-black p-1 text-center">Nama Bank</td>
                        <td class="border border-black p-1 text-center">No. Rekening / Virtual Account</td>
                        <td class="border border-black p-1 text-center">Atas Nama</td>
                        <td class="border border-black p-1 text-center">Nominal</td>
                        <td class="border border-black p-1 text-center">Kode Rekening</td>
                        <td class="border border-black p-1 text-center">Tujuan Penggunaan Dana</td>
                        <td class="border border-black p-1 text-center">Keterangan</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($instruction->tujuan as $record)
                    <tr style="page-break-inside: avoid">
                        <td class="border border-black p-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-black p-2 text-center">{{ $record['bank'] }}</td>
                        <td class="border border-black p-2 text-center">{{ $record['no_rekening'] }}</td>
                        <td class="border border-black p-2 text-center">{{ $record['atas_nama'] }}</td>
                        <td class="border border-black p-2 text-center">{{ \App\Support\FormatCurrency::idr($record['jumlah_transfer']) }}</td>
                        <td class="border border-black p-2 text-center">{{ $record['kode_rekening'] }}</td>
                        <td class="border border-black p-2 text-center">{{ $record['nama_tujuan'] }}</td>
                        <td class="border border-black p-2 text-left prose">{!! $record['keterangan'] !!}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="border border-black p-2 text-center">Jumlah Dana</td>
                        <td class="border border-black p-2 text-center">{{ \App\Support\FormatCurrency::idr($instruction->jumlah) }}</td>
                        <td colspan="3" class="border border-black p-2 text-left">Terbilang : <br/><span class="capitalize italic">{{ Number::spell($instruction->jumlah, locale: 'id') }} rupiah</span></td>
                    </tr>
                </tbody>

              </table>
            </div>
          </div>
          <div class="flex flex-row justify-center gap-12">
            <div>
                <div class="mt-6">Mengetahui,</div>
                <div>Kepala Sekolah</div>
                <div>Kuasa Pengguna Anggaran</div>
                <div class="mt-24">{{$setting->nama_kepala_sekolah}}</div>
                <div>NIP. {{$setting->nip_kepala_sekolah}}</div>
            </div>
            <div>
                <div>{{ $setting->tempat }}, {{ $instruction->tanggal->translatedFormat('d F Y') }}</div>
                <div class="mt-6">Bendahara</div>
                <div>Pengeluaran Pembantu,</div>
                <div class="mt-24">{{$setting->nama_bendahara}}</div>
                <div>NIP. {{$setting->nip_bendahara}}</div>
            </div>
            </div>
        </div>
    </div>

</x-layouts.print>
