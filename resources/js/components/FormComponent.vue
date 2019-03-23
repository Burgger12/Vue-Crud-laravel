<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>¿Que estas pensando?</h3>
                </div>
                <div class="card-body">
                    <div>
                        <form action="" v-on:submit.prevent="newThought()">
                            <div class="form-group">
                                <label for="thought">Ahora estoy pensando en:</label>
                                <input type="text" class="form-control" name="thought" v-model="description">
                            </div>
                            <button class="btn btn-primary" type="submit">Enviar pensamiento</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            description:'',

        }
    },
    methods:{
        newThought(){
            const params = {
                description: this.description
            };
            axios.post('http://localhost/Vue-Crud-laravel/Vue-Laravel/public/thought',params)
                .then((response) => {
                    const thought = response.data;
                    this.$emit('new', thought);
                });
            this.description = '';
        }
    }
}
</script>