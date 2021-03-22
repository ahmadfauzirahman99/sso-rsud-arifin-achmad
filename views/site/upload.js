function absenMasuk(e) {
  Swal.fire({
    title: "Anda Ingin Mengisi Absen Masuk?",
    text: "Absen Pagi",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Ya, Simpan Absen Masuk",
    cancelButtonText: "Tidak, Periksa Kembali!",
    confirmButtonClass: "btn btn-success mt-2",
    cancelButtonClass: "btn btn-danger ml-2 mt-2",
    buttonsStyling: !1,
  }).then(function (t) {
    if (t.value) {
      $.post(
        "http://sso.rsud-arifin.apps/site/absen",
        { id: $(e).data("value") },
        function (r) {
          //   console.log(e);
          if (r.s) {
            toastr["success"]("Selamat Datang , Selamat Bekerja!!");
          } else {
            toastr["warning"](
              "Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e)
            );
          }
        },
        "JSON"
      );
    } else if (t.dismiss === swal.DismissReason.cancel) {
      Swal.fire({
        title: "Cancelled",
        text: "Batal",
        type: "error",
      });
    }
  });
}

function absenKeluar(e) {
    Swal.fire({
        title: "Anda Ingin Mengisi Absen Keluar?",
        text: "Absen Pulang",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, Simpan Absen Pulang",
        cancelButtonText: "Tidak, Periksa Kembali!",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ml-2 mt-2",
        buttonsStyling: !1,
      }).then(function (t) {
        if (t.value) {
          $.post(
            "http://sso.rsud-arifin.apps/site/absen-keluar",
            { id: $(e).data("value") },
            function (r) {
              //   console.log(e);
              if (r.s) {
                toastr["success"]("Hati-Hati Ya Pulangnya, Mandi Dulu Sebelum Betemu Keluarga Ya !! :)");
              } else {
                toastr["warning"](
                  "Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e)
                );
              }
            },
            "JSON"
          );
        } else if (t.dismiss === swal.DismissReason.cancel) {
          Swal.fire({
            title: "Cancelled",
            text: "Nggak Jadi Pulang!",
            type: "error",
          });
        }
      });
}
