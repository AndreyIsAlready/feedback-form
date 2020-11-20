<template>
    <div class="container">
            <label for="name">
                    <span>Имя</span>
                    <input
                            :style="validate.name ? 'border: 1px solid red;': ''"
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Your name"
                            v-model="name"
                            @focus="removeError($event)"
                    >
                    <span class="error"></span>
            </label>

            <label for="phone">
                    <span>Телефон</span>
                    <input
                            :style="validate.phone ? 'border: 1px solid red;': ''"
                            type="text"
                            id="phone"
                            name="phone"
                            placeholder="Your phone"
                            v-model="phone"
                            @input="validatePhone()"
                            @focus="removeError($event)"

                    >
                    <span class="error"></span>
            </label>

            <label for="subject">
                    <span>Текст</span>
                    <textarea
                            :style="validate.subject ? 'border: 1px solid red;': ''"
                            id="subject"
                            name="subject"
                            placeholder="Write something.."
                            style="height:200px"
                            v-model="subject"
                            @focus="removeError($event)"
                    >{{ subject }}</textarea>
                    <span class="error"></span>
            </label>
            <input type="submit" value="Submit" @click="submit()">

    </div>
</template>

<script>
    export default {
        name: "Feedback",
        data() {
          return {
              phone: '',
              name: '',
              subject: '',
              validate: {
                      phone: false,
                      name: false,
                      subject: false,
              }
          }
        },
        methods:{
            validatePhone() {
                this.phone = !isNaN( this.phone) ? this.phone : this.phone.slice(0, -1);
            },

            async submit() {
                 const body = {
                         name: this.name,
                         phone: this.phone,
                         subject: this.subject
                 };

                 let response = await axios.post(`/save`, body);

                 if (response.data[0] === true) {
                         alert('Заявка сохранена')
                 } else {
                         this._validate(response.data.errors);
                 }
            },

            _validate(response) {
                   for (let key in response) {
                           this.validate[key] = true;
                           const elem = document.querySelector(`#${key}`).parentNode;
                           elem.querySelector('.error').innerHTML = response[key];
                   }
            },

            removeError(e) {
                    const id = e.target.id;
                    this.validate[id] = false;
                    const elem = document.querySelector(`#${id}`).parentNode;
                    elem.querySelector('.error').innerHTML = '';
            }
        },
    }
</script>

<style scoped>
    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    input[type=text], textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .error {
            display: block;
            color: #ff0003;
    }
</style>