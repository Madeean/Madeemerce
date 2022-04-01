<div>
    <div>
        @if ($belanja->status == 1)
            <button class="btn btn-info items-center justify-center" id="pay-button" type="button">Pay!</button>
        @elseif($belanja->status == 2)
        <div class="card w-full">

            <div class="overflow-x-auto">
                <table class="table w-full border-t-0">
                  <tr>
                      <td>Virtual Akun</td>
                      <td>:</td>
                      <td>{{ $va_number }}</td>
                  </tr>
                  <tr>
                      <td>Bank</td>
                      <td>:</td>
                      <td>{{ $bank }}</td>
                  </tr>
                  <tr>
                      <td>Total Harga</td>
                      <td>:</td>
                      <td>{{ $gross_amount }}</td>
                  </tr>
                  <tr>
                      <td>Status</td>
                      <td>:</td>
                      <td>{{ $transaction_status }}</td>
                  </tr>
                  <tr>
                      <td>Batas Waktu Pembayaran</td>
                      <td>:</td>
                      <td>{{ $deadline }}</td>
                  </tr>
                </table>
              </div>
        </div>
        @endif
        

    </div>

    <div>

    <form action="Payment" method="get" id="payment-form">
        <input type="hidden" name="result_data" id="result-data" value=""></div>
    </form>

    @push('scripts')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-bN5BjvyA_fs_JhZa"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');
                function changeResult(type,data){
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                }
            

                snap.pay('<?=$snapToken?>',{
                    onSuccess: function(result){
                        changeResult('success',result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result){
                        changeResult('pending',result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result){
                        changeResult('error',result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            };
        </script>
    @endpush
</div>
