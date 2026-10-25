document.addEventListener("DOMContentLoaded", function () {
  var toggle = document.querySelector(".nav-toggle");
  var header = document.querySelector(".site-header");

  if (toggle && header) {
    toggle.addEventListener("click", function () {
      var isOpen = header.classList.toggle("is-nav-open");
      toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });
  }

  initPhotoLimitCheck("photo", "photo-error");
  initPhotoLimitCheck("c-photo", "c-photo-error");
  initPhotoLimitCheck("b-photo", "b-photo-error");

  initEmailConfirmCheck("email", "email-confirm", "email-match-note");
  initEmailConfirmCheck("b-email", "b-email-confirm", "b-email-match-note");

  initConfirmFlow("contact-form", "contact-confirm", "contact-complete", [
    { name: "name", label: "お名前" },
    { name: "company", label: "会社名" },
    { name: "tel", label: "電話番号" },
    { name: "email", label: "メールアドレス" },
    { name: "type", label: "お問い合わせ種別" },
    { name: "message", label: "お問い合わせ内容" },
    { name: "photos[]", label: "添付ファイル名" },
    { name: "contact_method", label: "連絡方法" },
    { name: "contact_time", label: "連絡時間" }
  ]);

  initConfirmFlow("community-form", "community-confirm", "community-complete", [
    { name: "name", label: "お名前" },
    { name: "contact", label: "電話番号またはメールアドレス" },
    { name: "datetime", label: "発生日時" },
    { name: "place", label: "場所" },
    { name: "detail", label: "お気付きの内容" },
    { name: "reply", label: "返信希望の有無" },
    { name: "contact_method", label: "連絡方法" },
    { name: "contact_time", label: "連絡時間" },
    { name: "photos[]", label: "添付ファイル名" }
  ]);

  initConfirmFlow("corporate-form", "corporate-confirm", "corporate-complete", [
    { name: "company", label: "会社名" },
    { name: "person", label: "担当者名" },
    { name: "tel", label: "電話番号" },
    { name: "email", label: "メールアドレス" },
    { name: "location", label: "回収場所" },
    { name: "scrap_category", label: "品目カテゴリ" },
    { name: "scrap_type", label: "品目詳細" },
    { name: "amount", label: "数量" },
    { name: "frequency", label: "回収頻度" },
    { name: "container", label: "コンテナ設置希望" },
    { name: "timing", label: "希望時期" },
    { name: "vehicle_access", label: "車両進入条件" },
    { name: "loading_equipment", label: "積込み設備" },
    { name: "loading_condition", label: "積込み条件" },
    { name: "photos[]", label: "添付ファイル名" },
    { name: "contact_method", label: "連絡方法" },
    { name: "contact_time", label: "連絡時間" },
    { name: "note", label: "その他要望" }
  ]);
});

/**
 * 入力画面 → 確認画面 → 送信完了画面の3段階フロー。
 * 「確認画面へ」ではpreventDefault()のみ行いページ内で確認表示、「この内容で送信する」を押した時に
 * 初めてfetch()で本番エンドポイント(form.action)へ送信する。バックエンドが未実装のうちは常に
 * 失敗レスポンス(またはネットワークエラー)になるため、見かけ上の成功表示は行わない。
 * 送信成功(HTTPステータス2xx)が確認できた場合のみ完了画面を表示する。
 * fields には確認画面に表示する項目を { name, label } の配列で明示的に指定する
 * (添付ファイルはファイル名のみ表示し、画像やPDFそのものは埋め込まない)。
 */
function initConfirmFlow(formId, confirmId, completeId, fields) {
  var form = document.getElementById(formId);
  var confirmSection = document.getElementById(confirmId);
  var completeSection = document.getElementById(completeId);
  if (!form || !confirmSection || !completeSection || !fields) return;

  var listEl = confirmSection.querySelector(".form-confirm__list");
  var backBtn = confirmSection.querySelector(".form-confirm__back");
  var sendBtn = confirmSection.querySelector(".form-confirm__send");
  var sendBtnDefaultText = sendBtn ? sendBtn.textContent : "";
  var errorEl = confirmSection.querySelector(".form-confirm__error");

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }
    renderSummary();
    if (errorEl) errorEl.textContent = "";
    form.hidden = true;
    confirmSection.hidden = false;
    confirmSection.scrollIntoView({ behavior: "smooth", block: "start" });
  });

  if (backBtn) {
    backBtn.addEventListener("click", function () {
      // form要素の値はDOM上に残ったままなので、ここでは表示切り替えのみ行い入力内容を保持する。
      // ファイル選択もブラウザ側でクリアしていないため通常は保持されるが、ブラウザ仕様上
      // programmaticには再設定できないため、万一保持されない場合は選び直しが必要になる。
      confirmSection.hidden = true;
      form.hidden = false;
      form.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  }

  if (sendBtn) {
    sendBtn.addEventListener("click", function () {
      if (sendBtn.disabled) return; // 二重送信防止
      sendBtn.disabled = true;
      if (backBtn) backBtn.disabled = true;
      if (errorEl) errorEl.textContent = "";
      sendBtn.textContent = "送信中です…";

      var formData = new FormData(form);

      fetch(form.action, { method: "POST", body: formData })
        .then(function (res) {
          if (!res.ok) throw new Error("送信に失敗しました(status " + res.status + ")");
          confirmSection.hidden = true;
          completeSection.hidden = false;
          completeSection.scrollIntoView({ behavior: "smooth", block: "start" });
        })
        .catch(function () {
          if (errorEl) {
            errorEl.textContent = "送信に失敗しました。時間をおいて再度お試しいただくか、お電話でご連絡ください。";
          }
        })
        .finally(function () {
          sendBtn.disabled = false;
          if (backBtn) backBtn.disabled = false;
          sendBtn.textContent = sendBtnDefaultText;
        });
    });
  }

  function renderSummary() {
    if (!listEl) return;
    listEl.innerHTML = "";

    fields.forEach(function (field) {
      var value = getFieldDisplayValue(form, field.name);
      var row = document.createElement("div");
      var dt = document.createElement("dt");
      var dd = document.createElement("dd");
      dt.textContent = field.label;
      dd.textContent = value !== null ? value : "(未入力)";
      row.appendChild(dt);
      row.appendChild(dd);
      listEl.appendChild(row);
    });
  }
}

/**
 * フォーム内の項目名からユーザーに見せる値を取り出す。
 * ラジオ・セレクトは内部値(例: "regular")ではなく、画面に表示されているラベル文字列
 * (例: "定期回収")を返すことで、確認画面でも分かりやすい日本語表示にする。
 */
function getFieldDisplayValue(form, name) {
  var el = form.elements[name];
  if (!el) return null;

  // 同名のラジオボタン群(RadioNodeList)
  if (typeof RadioNodeList !== "undefined" && el instanceof RadioNodeList) {
    for (var i = 0; i < el.length; i++) {
      if (el[i].checked) {
        var label = el[i].closest("label");
        return label ? label.textContent.trim() : el[i].value;
      }
    }
    return null;
  }

  if (el.tagName === "SELECT") {
    if (el.selectedIndex < 0 || !el.value) return null;
    return el.options[el.selectedIndex].text;
  }

  if (el.type === "file") {
    if (!el.files || el.files.length === 0) return null;
    return Array.prototype.map.call(el.files, function (f) { return f.name; }).join("、");
  }

  if (el.type === "checkbox") {
    return el.checked ? "はい" : null;
  }

  return el.value ? el.value : null;
}

/**
 * 添付ファイルの件数・拡張子/MIMEタイプ・1ファイルあたりの容量・合計容量を選択時にチェックする。
 * ここでの判定はユーザー体験向上のためのものであり、実運用ではサーバー側でも同じ上限とMIMEタイプの
 * 検証を必ず行うこと(クライアント側チェックのみでは容易に回避できる)。
 */
function initPhotoLimitCheck(inputId, errorId) {
  var input = document.getElementById(inputId);
  var errorEl = errorId ? document.getElementById(errorId) : null;
  if (!input) return;

  var maxFiles = 5;
  var maxSize = 5 * 1024 * 1024;
  var maxTotalSize = 25 * 1024 * 1024;
  var allowedTypes = ["image/jpeg", "image/png", "application/pdf"];

  function showError(message) {
    if (errorEl) {
      errorEl.textContent = message;
    } else {
      alert(message);
    }
    input.value = "";
  }

  function clearError() {
    if (errorEl) errorEl.textContent = "";
  }

  input.addEventListener("change", function () {
    var files = Array.prototype.slice.call(input.files);
    clearError();
    if (files.length === 0) return;

    if (files.length > maxFiles) {
      showError("添付できるファイルは" + maxFiles + "件までです。");
      return;
    }

    var invalidTypeFile = files.find(function (file) {
      return allowedTypes.indexOf(file.type) === -1;
    });
    if (invalidTypeFile) {
      showError("JPG・PNG・PDF形式のファイルのみ添付できます。");
      return;
    }

    var oversizedFile = files.find(function (file) {
      return file.size > maxSize;
    });
    if (oversizedFile) {
      showError("1ファイルあたり5MB以下にしてください。");
      return;
    }

    var totalSize = files.reduce(function (sum, file) {
      return sum + file.size;
    }, 0);
    if (totalSize > maxTotalSize) {
      showError("添付ファイルの合計容量は25MB以下にしてください。");
    }
  });
}

/**
 * メールアドレスと確認用メールアドレスの一致を送信前にチェックする。
 * サーバー側でも email と email_confirm の一致を必ず検証すること。
 */
function initEmailConfirmCheck(emailId, confirmId, noteId) {
  var emailInput = document.getElementById(emailId);
  var confirmInput = document.getElementById(confirmId);
  var note = noteId ? document.getElementById(noteId) : null;
  if (!emailInput || !confirmInput) return;

  var form = confirmInput.closest("form");

  function check() {
    if (!confirmInput.value) {
      confirmInput.setCustomValidity("");
      if (note) note.textContent = "";
      return true;
    }
    var matches = emailInput.value === confirmInput.value;
    confirmInput.setCustomValidity(matches ? "" : "メールアドレスが一致しません。");
    if (note) note.textContent = matches ? "" : "メールアドレスが一致しません。";
    return matches;
  }

  emailInput.addEventListener("input", check);
  confirmInput.addEventListener("input", check);

  if (form) {
    form.addEventListener("submit", function (e) {
      if (!check()) {
        e.preventDefault();
        confirmInput.reportValidity();
      }
    });
  }
}
