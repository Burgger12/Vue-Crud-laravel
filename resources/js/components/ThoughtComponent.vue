<template>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Publicado en {{thought.created_at}}</h5>
                </div>
                <div class="card-body">
                    <input v-if="editMode" type="text" class="form-control" v-model="thought.description">
                    <p v-else>{{thought.description}}</p>
                </div>
                <div class="card-footer">
                    <button v-if="editMode" class="btn btn-success"  @click="onUpdate()">Guardar</button>
                    <button v-else class="btn btn-default"  @click="onEdit()">editar</button>
                    <button class="btn btn-danger" @click="onDelete()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:[
        'thought'
    ],
    data(){
        return{
            editMode: false
        }
    },
    methods:{
        onDelete(){
            axios.delete('http://localhost/Vue-Crud-laravel/Vue-Laravel/public/thought'+ '/' + this.thought.id).then((Response)=>{
                this.$emit('delete');
            }).catch(e => {
            console.log(e);
        });
            
        },
        onEdit(){
            this.editMode = true;
        },
        onUpdate(){
            const params ={
                description: this.thought.description
            };
            axios.put('http://localhost/Vue-Crud-laravel/Vue-Laravel/public/thought'+ '/' + this.thought.id, params).then((Response)=>{
                this.editMode = false;
                //const thought = Response.data;
                this.$emit('update',thought);
            }).catch(e => {
            console.log(e);
        });
        }
    }
}
</script>