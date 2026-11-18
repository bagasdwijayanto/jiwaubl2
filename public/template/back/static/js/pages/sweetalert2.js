const Swal2 = Swal.mixin({
  customClass: {
    input: 'form-control'
  }
})


const on = (id, handler) => {
  const el = document.getElementById(id)
  if (el) el.addEventListener('click', handler)
}

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})




on("basic", (e) => {
  Swal2.fire("Any fool can use a computer")
})
on("footer", (e) => {
  Swal2.fire({
    icon: "error",
    title: "Oops...",
    text: "Something went wrong!",
    footer: "<a href>Why do I have this issue?</a>",
  })
})
on("title", (e) => {
  Swal2.fire("The Internet?", "That thing is still around?", "question")
})
on("success", (e) => {
  Swal2.fire({
    icon: "success",
    title: "Success",
  })
})
on("error", (e) => {
  Swal2.fire({
    icon: "error",
    title: "Error",
  })
})
on("warning", (e) => {
  Swal2.fire({
    icon: "warning",
    title: "Warning",
  })
})
on("info", (e) => {
  Swal2.fire({
    icon: "info",
    title: "Info",
  })
})
on("question", (e) => {
  Swal2.fire({
    icon: "question",
    title: "Question",
  })
})
on("text", (e) => {
  Swal2.fire({
    title: "Enter your IP address",
    input: "text",
    inputLabel: "Your IP address",
    showCancelButton: true,
  })
})
on("email", async (e) => {
  const { value: email } = await Swal2.fire({
    title: "Input email address",
    input: "email",
    inputLabel: "Your email address",
    inputPlaceholder: "Enter your email address",
  })

  if (email) {
    Swal2.fire(`Entered email: ${email}`)
  }
})
on("url", async (e) => {
  const { value: url } = await Swal2.fire({
    input: "url",
    inputLabel: "URL address",
    inputPlaceholder: "Enter the URL",
  })

  if (url) {
    Swal2.fire(`Entered URL: ${url}`)
  }
})
on("password", async (e) => {
  const { value: password } = await Swal2.fire({
    title: "Enter your password",
    input: "password",
    inputLabel: "Password",
    inputPlaceholder: "Enter your password",
    inputAttributes: {
      maxlength: 10,
      autocapitalize: "off",
      autocorrect: "off",
    },
  })

  if (password) {
    Swal2.fire(`Entered password: ${password}`)
  }
})
on("textarea", async (e) => {
  const { value: text } = await Swal2.fire({
    input: "textarea",
    inputLabel: "Message",
    inputPlaceholder: "Type your message here...",
    inputAttributes: {
      "aria-label": "Type your message here",
    },
    showCancelButton: true,
  })

  if (text) {
    Swal2.fire(text)
  }
})
on("select", async (e) => {
  const { value: fruit } = await Swal2.fire({
    title: "Select field validation",
    input: "select",
    inputOptions: {
      Fruits: {
        apples: "Apples",
        bananas: "Bananas",
        grapes: "Grapes",
        oranges: "Oranges",
      },
      Vegetables: {
        potato: "Potato",
        broccoli: "Broccoli",
        carrot: "Carrot",
      },
      icecream: "Ice cream",
    },
    inputPlaceholder: "Select a fruit",
    showCancelButton: true,
    inputValidator: (value) => {
      return new Promise((resolve) => {
        if (value === "oranges") {
          resolve()
        } else {
          resolve("You need to select oranges :)")
        }
      })
    },
  })

  if (fruit) {
    Swal2.fire(`You selected: ${fruit}`)
  }
})

// Toasts
on('toast-success', () => {
  Toast.fire({
    icon: 'success',
    title: 'Signed in successfully'
  })
})
on('toast-warning', () => {
  Toast.fire({
    icon: 'warning',
    title: 'Please input your email'
  })
})
on('toast-failed', () => {
  Toast.fire({
    icon: 'error',
    title: 'Transaction error. Please try again later'
  })
})