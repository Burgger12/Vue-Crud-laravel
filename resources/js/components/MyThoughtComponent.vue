<template>
    <div>
        <form-component @new="addThought"></form-component>
        <thought-component 
            v-for="(thought,index) in thoughts" 
            :key="thought.id" 
            :thought="thought"
            @update="updateThought(index,...arguments)"
            @delete="deleteThought(index)">
        </thought-component>
    </div>
</template>
<script>
export default {
    data(){
        return{
            thoughts:[]
        }
    },
    mounted(){
        axios.get('http://localhost/Vue-Crud-laravel/Vue-Laravel/public/thought').then((Response)=>{
            this.thoughts = Response.data;
        });
    },
    methods:{
        addThought(thought){
            this.thoughts.push(thought);
        },
        deleteThought(index,thought){
            this.thoughts[index] = thought;
        },
        updateThought(index){
            this.thoughts.splice(index,1);
        }
    }
}
</script>