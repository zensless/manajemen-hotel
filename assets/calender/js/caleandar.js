/*
  Author: Jack Ducasse;
  Version: 0.1.0;
  (◠‿◠✿)
*/
var Kalender = function (model, options, date) {
  // Nilai Default
  this.Options = {
    Warna: "",
    WarnaLink: "",
    NavTampil: true,
    NavVertikal: false,
    LokasiNav: "",
    TanggalWaktuTampil: true,
    FormatTanggalWaktu: "mmm, yyyy",
    LokasiTanggalWaktu: "",
    KlikEvent: "",
    TargetEventSehariPenuh: false,
    HariTidakAktif: [],
    UbahModel: model,
  };
  // Menimpa nilai default
  for (var key in options) {
    this.Options[key] =
      typeof options[key] == "string"
        ? options[key].toLowerCase()
        : options[key];
  }

  model ? (this.Model = model) : (this.Model = {});
  this.HariIni = new Date();

  this.Terpilih = this.HariIni;
  this.HariIni.Bulan = this.HariIni.getMonth();
  this.HariIni.Tahun = this.HariIni.getFullYear();
  if (date) {
    this.Terpilih = date;
  }
  this.Terpilih.Bulan = this.Terpilih.getMonth();
  this.Terpilih.Tahun = this.Terpilih.getFullYear();

  this.Terpilih.Hari = new Date(
    this.Terpilih.Tahun,
    this.Terpilih.Bulan + 1,
    0
  ).getDate();
  this.Terpilih.HariPertama = new Date(
    this.Terpilih.Tahun,
    this.Terpilih.Bulan,
    1
  ).getDay();
  this.Terpilih.HariTerakhir = new Date(
    this.Terpilih.Tahun,
    this.Terpilih.Bulan + 1,
    0
  ).getDay();

  this.Sebelum = new Date(this.Terpilih.Tahun, this.Terpilih.Bulan - 1, 1);
  if (this.Terpilih.Bulan == 0) {
    this.Sebelum = new Date(this.Terpilih.Tahun - 1, 11, 1);
  }
  this.Sebelum.Hari = new Date(
    this.Sebelum.getFullYear(),
    this.Sebelum.getMonth() + 1,
    0
  ).getDate();
};

function buatKalender(kalender, elemen, penyesuaian) {
  if (typeof penyesuaian !== "undefined") {
    var tanggalBaru = new Date(
      kalender.Terpilih.Tahun,
      kalender.Terpilih.Bulan + penyesuaian,
      1
    );
    kalender = new Kalender(kalender.Model, kalender.Options, tanggalBaru);
    elemen.innerHTML = "";
  } else {
    for (var key in kalender.Options) {
      typeof kalender.Options[key] != "function" &&
      typeof kalender.Options[key] != "object" &&
      kalender.Options[key]
        ? (elemen.className += " " + key + "-" + kalender.Options[key])
        : 0;
    }
  }
  var bulan = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];

  function TambahSidebar() {
    var sidebar = document.createElement("div");
    sidebar.className += "cld-sidebar";

    var daftarBulan = document.createElement("ul");
    daftarBulan.className += "cld-monthList";

    for (var i = 0; i < bulan.length - 3; i++) {
      var x = document.createElement("li");
      x.className += "cld-month";
      var n = i - (4 - kalender.Terpilih.Bulan);
      // Menyesuaikan nilai bulan yang melimpah
      if (n < 0) {
        n += 12;
      } else if (n > 11) {
        n -= 12;
      }
      // Menambahkan Kelas yang Tepat
      if (i == 0) {
        x.className += " cld-rwd cld-nav";
        x.addEventListener("click", function () {
          typeof kalender.Options.UbahModel == "function"
            ? (kalender.Model = kalender.Options.UbahModel())
            : (kalender.Model = kalender.Options.UbahModel);
          buatKalender(kalender, elemen, -1);
        });
        x.innerHTML +=
          '<svg height="15" width="15" viewBox="0 0 100 75" fill="rgba(255,255,255,0.5)"><polyline points="0,75 100,75 50,0"></polyline></svg>';
      } else if (i == bulan.length - 4) {
        x.className += " cld-fwd cld-nav";
        x.addEventListener("click", function () {
          typeof kalender.Options.UbahModel == "function"
            ? (kalender.Model = kalender.Options.UbahModel())
            : (kalender.Model = kalender.Options.UbahModel);
          buatKalender(kalender, elemen, 1);
        });
        x.innerHTML +=
          '<svg height="15" width="15" viewBox="0 0 100 75" fill="rgba(255,255,255,0.5)"><polyline points="0,0 100,0 50,75"></polyline></svg>';
      } else {
        if (i < 4) {
          x.className += " cld-pre";
        } else if (i > 4) {
          x.className += " cld-post";
        } else {
          x.className += " cld-curr";
        }

        (function () {
          var adj = i - 4;
          x.addEventListener("click", function () {
            typeof kalender.Options.UbahModel == "function"
              ? (kalender.Model = kalender.Options.UbahModel())
              : (kalender.Model = kalender.Options.UbahModel);
            buatKalender(kalender, elemen, adj);
          });
          x.setAttribute("style", "opacity:" + (1 - Math.abs(adj) / 4));
          x.innerHTML += bulan[n].substr(0, 3);
        })();

        if (n == 0) {
          var y = document.createElement("li");
          y.className += "cld-year";
          if (i < 5) {
            y.innerHTML += kalender.Terpilih.Tahun;
          } else {
            y.innerHTML += kalender.Terpilih.Tahun + 1;
          }
          daftarBulan.appendChild(y);
        }
      }
      daftarBulan.appendChild(x);
    }
    sidebar.appendChild(daftarBulan);
    if (kalender.Options.LokasiNav) {
      document.getElementById(kalender.Options.LokasiNav).innerHTML = "";
      document
        .getElementById(kalender.Options.LokasiNav)
        .appendChild(sidebar);
    } else {
      elemen.appendChild(sidebar);
    }
  }

  var bagianUtama = document.createElement("div");
  bagianUtama.className += "cld-main";

  function TambahTanggalWaktu() {
    var tanggalWaktu = document.createElement("div");
    tanggalWaktu.className += "cld-datetime";
    if (kalender.Options.NavTampil && !kalender.Options.NavVertikal) {
      var rwd = document.createElement("div");
      rwd.className += " cld-rwd cld-nav";
      rwd.addEventListener("click", function () {
        buatKalender(kalender, elemen, -1);
      });
      rwd.innerHTML =
        '<svg height="15" width="15" viewBox="0 0 75 100" fill="rgba(0,0,0,0.5)"><polyline points="0,50 75,0 75,100"></polyline></svg>';
      tanggalWaktu.appendChild(rwd);
    }
    var hariIni = document.createElement("div");
    hariIni.className += " today";
    hariIni.innerHTML =
      bulan[kalender.Terpilih.Bulan] + ", " + kalender.Terpilih.Tahun;
    tanggalWaktu.appendChild(hariIni);
    if (kalender.Options.NavTampil && !kalender.Options.NavVertikal) {
      var fwd = document.createElement("div");
      fwd.className += " cld-fwd cld-nav";
      fwd.addEventListener("click", function () {
        buatKalender(kalender, elemen, 1);
      });
      fwd.innerHTML =
        '<svg height="15" width="15" viewBox="0 0 75 100" fill="rgba(0,0,0,0.5)"><polyline points="0,0 75,50 0,100"></polyline></svg>';
      tanggalWaktu.appendChild(fwd);
    }
    if (kalender.Options.LokasiTanggalWaktu) {
      document.getElementById(kalender.Options.LokasiTanggalWaktu).innerHTML = "";
      document
        .getElementById(kalender.Options.LokasiTanggalWaktu)
        .appendChild(tanggalWaktu);
    } else {
      bagianUtama.appendChild(tanggalWaktu);
    }
  }

  function TambahLabel() {
    var label = document.createElement("ul");
    label.className = "cld-labels";
    var daftarLabel = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
    for (var i = 0; i < daftarLabel.length; i++) {
      var itemLabel = document.createElement("li");
      itemLabel.className += "cld-label";
      itemLabel.innerHTML = daftarLabel[i];
      label.appendChild(itemLabel);
    }
    bagianUtama.appendChild(label);
  }

  function TambahHari() {
    function NomorHari(n) {
      var nomor = document.createElement("p");
      nomor.className += "cld-number";
      nomor.innerHTML += n;
      return nomor;
    }
    var hari = document.createElement("ul");
    hari.className += "cld-days";

    for (var i = 0; i < kalender.Terpilih.HariPertama; i++) {
      var hariItem = document.createElement("li");
      hariItem.className += "cld-day prevMonth";
      var d = i % 7;
      for (var q = 0; q < kalender.Options.HariTidakAktif.length; q++) {
        if (d == kalender.Options.HariTidakAktif[q]) {
          hariItem.className += " disableDay";
        }
      }

      var nomor = NomorHari(
        kalender.Sebelum.Hari - kalender.Terpilih.HariPertama + (i + 1)
      );
      hariItem.appendChild(nomor);

      hari.appendChild(hariItem);
    }

    for (var i = 0; i < kalender.Terpilih.Hari; i++) {
      var hariItem = document.createElement("li");
      hariItem.className += "cld-day currMonth";
      var d = (i + kalender.Terpilih.HariPertama) % 7;
      for (var q = 0; q < kalender.Options.HariTidakAktif.length; q++) {
        if (d == kalender.Options.HariTidakAktif[q]) {
          hariItem.className += " disableDay";
        }
      }
      var nomor = NomorHari(i + 1);
      for (var n = 0; n < kalender.Model.length; n++) {
        var evDate = kalender.Model[n].Date;
        var toDate = new Date(
          kalender.Terpilih.Tahun,
          kalender.Terpilih.Bulan,
          i + 1
        );
        if (evDate.getTime() == toDate.getTime()) {
          nomor.className += " eventday";
          var judul = document.createElement("span");
          judul.className += "cld-title";
          if (
            typeof kalender.Model[n].Link == "function" ||
            kalender.Options.KlikEvent
          ) {
            var a = document.createElement("a");
            a.setAttribute("href", "#");
            a.innerHTML += kalender.Model[n].Title;
            if (kalender.Options.KlikEvent) {
              var z = kalender.Model[n].Link;
              if (typeof kalender.Model[n].Link != "string") {
                a.addEventListener(
                  "click",
                  kalender.Options.KlikEvent.bind.apply(
                    kalender.Options.KlikEvent,
                    [null].concat(z)
                  )
                );
                if (kalender.Options.TargetEventSehariPenuh) {
                  hariItem.className += " clickable";
                  hariItem.addEventListener(
                    "click",
                    kalender.Options.KlikEvent.bind.apply(
                      kalender.Options.KlikEvent,
                      [null].concat(z)
                    )
                  );
                }
              } else {
                a.addEventListener(
                  "click",
                  kalender.Options.KlikEvent.bind(null, z)
                );
                if (kalender.Options.TargetEventSehariPenuh) {
                  hariItem.className += " clickable";
                  hariItem.addEventListener(
                    "click",
                    kalender.Options.KlikEvent.bind(null, z)
                  );
                }
              }
            } else {
              a.addEventListener("click", kalender.Model[n].Link);
              if (kalender.Options.TargetEventSehariPenuh) {
                hariItem.className += " clickable";
                hariItem.addEventListener("click", kalender.Model[n].Link);
              }
            }
            judul.appendChild(a);
          } else {
            judul.innerHTML +=
              '<a href="' +
              kalender.Model[n].Link +
              '">' +
              kalender.Model[n].Title +
              "</a>";
          }
          nomor.appendChild(judul);
        }
      }
      hariItem.appendChild(nomor);
      if (
        i + 1 == kalender.HariIni.getDate() &&
        kalender.Terpilih.Bulan == kalender.HariIni.Bulan &&
        kalender.Terpilih.Tahun == kalender.HariIni.Tahun
      ) {
        hariItem.className += " today";
      }
      hari.appendChild(hariItem);
    }

    var hariTambahan = 13;
    if (hari.children.length > 35) {
      hariTambahan = 6;
    } else if (hari.children.length < 29) {
      hariTambahan = 20;
    }

    for (var i = 0; i < hariTambahan - kalender.Terpilih.HariTerakhir; i++) {
      var hariItem = document.createElement("li");
      hariItem.className += "cld-day nextMonth";
      var d = (i + kalender.Terpilih.HariTerakhir + 1) % 7;
      for (var q = 0; q < kalender.Options.HariTidakAktif.length; q++) {
        if (d == kalender.Options.HariTidakAktif[q]) {
          hariItem.className += " disableDay";
        }
      }

      var nomor = NomorHari(i + 1);
      hariItem.appendChild(nomor);

      hari.appendChild(hariItem);
    }
    bagianUtama.appendChild(hari);
  }

  if (kalender.Options.Warna) {
    bagianUtama.innerHTML +=
      "<style>.cld-main{color:" + kalender.Options.Warna + ";}</style>";
  }
  if (kalender.Options.WarnaLink) {
    bagianUtama.innerHTML +=
      "<style>.cld-title a{color:" + kalender.Options.WarnaLink + ";}</style>";
  }
  elemen.appendChild(bagianUtama);

  if (kalender.Options.NavTampil && kalender.Options.NavVertikal) {
    TambahSidebar();
  }
  if (kalender.Options.TanggalWaktuTampil) {
    TambahTanggalWaktu();
  }
  TambahLabel();
  TambahHari();
}

function kalender(el, data, settings) {
  var obj = new Kalender(data, settings);
  buatKalender(obj, el);
}
