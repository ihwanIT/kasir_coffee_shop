<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            // Redirect ke halaman sukses setelah pembayaran berhasil
            window.location.href = '{{ route('kasir.transaksi') }}';
        }
    });
</script>



