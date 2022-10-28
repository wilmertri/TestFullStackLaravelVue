<template>
    <div class="login">
		<div class="container">
			<div class='columns is-centered'>
      			<div class='column is-6'>
                    <div class="card">
                        <div class="card-content">
                            <p class="title  has-text-centered">
                                Iniciar sesión
                            </p>
                            <p class="subtitle  has-text-centered">
                                Ingresa tus datos
                            </p>
                            <form action class="form" @submit.prevent="getLogin">
                                <div class="field">
                                    <label class="label">Email</label>
                                    <p class="control has-icons-left has-icons-right">
                                        <input v-model="email" class="input" type="email" placeholder="Email">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </p>
                                </div>
                                <div class="field">
                                    <label class="label">Password</label>
                                    <p class="control has-icons-left">
                                        <input v-model="password" class="input" type="password" placeholder="Password">
                                        <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                        </span>
                                    </p>
                                </div>
                                <p v-if="error" class="error has-text-centered mb-2"><span class="tag is-danger">Has introducido mal el email o la contraseña.</span></p>
                                <div class="field has-text-centered">
                                    <p class="control">
                                        <button class="button is-success">
                                            Ingresar
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item register">
                                <span>
                                    Registro
                                </span>
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    name: 'LoginView',
	data:() => ({
		'email': "",
        'password': "",
        'error': false,
        'user': "",
        'token': ""
	}),	
    components: {
    },
	mounted(){
		document.title = 'Login | Store'
	},
	methods:{
		async getLogin() {
            try {
                const user = { email: this.email, password: this.password };
                const response = await axios.post(`api/v1/login`, user);
                localStorage.setItem('token', response.data.authorisation.token);
                this.$store.dispatch('user', response.data.user);
                this.$router.push('/home');
            } catch(err){
                this.email = "";
                this.password = "";
                this.error = true;
            }
		}
	}
}
</script>