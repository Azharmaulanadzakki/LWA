<style>
    .truncated-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: all 300ms linear;
    }

    .truncated-text:hover {
        white-space: normal;
        overflow: visible;
        transition: all 300ms linear;
    }
</style>


@foreach ($mapels as $index => $mapel)
    <div id="mapel-list-{{ $index }} pay-button" onclick="payButton({{ $mapel->id }})"
        class="rounded-3xl shadow-lg mapel-item hover:cursor-pointer" data-index="{{ $index }}">
        <div class="rounded-3xl shadow-lg bg-white">
            <div class="rounded-b-none rounded-t-3xl overflow-hidden">
                <img src="{{ asset('/storage/mapels/' . $mapel->image) }}" alt="" class="aspect-[1/1] w-full h-52">
            </div>
            <div class="p-2 sm:p-4 flex flex-col">
                <h5 class="text-xl font-bold mt-3 text-gray-900 truncated-text">
                    {{ $mapel->judul }}
                </h5>
                <h6 class="text-md font-normal text-gray-600">
                    Rp.{{ number_format($mapel->harga, 2, ',', '.') }}
                </h6>
                <div class="flex justify-end items-end space-x-2">
                    <i class="fa-duotone fa-signal-bars py-1 text-2xl font-bold" style="color: #506fff;">
                    </i>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endforeach

<script>
    // const payButton = document.getElementById("pay-button");
    // payButton.addEventListener("click", () => {
    //     console.log("a");
    // })



    const payButton = (mapel) => {
        console.log(mapel);
        $.ajax({
            type: "GET",
            url: "/materi/" + mapel,
            data: "",
            dataType: "JSON",
            success: function(response) {
                window.snap.pay(response.snapToken, {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        console.log(result);

                        $.get("{{ route('callback', '') }}" + "/" +
                            response.pembayaran_id,
                            function(textStatus, jqXHR) {},
                            "dataType"
                        );
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        console.log(result);
                    },
                    onClose: function(result) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('payment.destroy', '') }}" + "/" +
                                response.pembayaran_id,
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                console.log(result);
                            }
                        });
                    }
                });
            },
            error: function() {
                // window.location.href = "{{ route('materis.view', '') }}" + "/" + mapel;
            }
        });
    }
</script>
