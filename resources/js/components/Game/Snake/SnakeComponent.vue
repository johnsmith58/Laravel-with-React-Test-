
<template>
    <div class="container">
        <h1>Snake</h1>

        <div class="column">
            Cell Size (px):
            <input type="number" min="10" v-model.number="cellSize">
        </div>
        <div class="column">
            Board Size (px):
            <input type="number" min="5" v-model.number="boardSize">
        </div>
        <div class="column">
            Speed:
            <input type="number" min="1" v-model.number="speed">
        </div>

        <snakeCanvas 
        :cellSize="cellSize"
        :boardSize="boardSize"
        :speed="speed"
        :isPlaying="isPlaying"
        :stop="stop"
        :addScores="addScores"
        :scores="scores" />

        <div>Scores : {{scores}}</div>

        <button id="play-btn" v-on:click="isPlaying ? stop() : start()">{{ isPlaying ? 'Stop' : 'Play' }}</button>

    </div>
</template>
<style src="./css/snake.css"></style>

<script>

    import SnakeCanvas from './SnakeCanvasComponent'

    export default {
        components:{
            'snakeCanvas': SnakeCanvas
        },
        data(){
            return{
                cellSize: 10,
                boardSize: 20,
                speed: 10,
                scores: 0,
                isPlaying: false
            }
        },
        methods: {
            start(){
                this.isPlaying = true;
                this.scores = 0
            },
            stop(){
                this.isPlaying = false;
            },
            addScores(scores) {
                this.scores += scores;
            }
        }
    }
</script>
