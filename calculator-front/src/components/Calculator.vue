<template>
    <div class="calculator">
      <div class="display">{{ expression }}</div>
      <div class="buttons">
        <div class="row">
          <button @click="appendToExpression('(')">(</button>
          <button @click="appendToExpression(')')">)</button>
          <button @click="clearExpression()">C</button>
          <button @click="backspace()">←</button>
        </div>
        <div class="row">
          <button @click="appendToExpression('7')">7</button>
          <button @click="appendToExpression('8')">8</button>
          <button @click="appendToExpression('9')">9</button>
          <button @click="appendToExpression('*')">*</button>
        </div>
        <div class="row">
          <button @click="appendToExpression('4')">4</button>
          <button @click="appendToExpression('5')">5</button>
          <button @click="appendToExpression('6')">6</button>
          <button @click="appendToExpression('/')">/</button>
        </div>
        <div class="row">
          <button @click="appendToExpression('1')">1</button>
          <button @click="appendToExpression('2')">2</button>
          <button @click="appendToExpression('3')">3</button>
          <button @click="appendToExpression('+')">+</button>
        </div>
        <div class="row">
          <button @click="appendToExpression('0')">0</button>
          <button @click="appendToExpression('.')">.</button>
          <button @click="appendToExpression('-')">-</button>
          <button @click="evaluate()">=</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        expression: ''
      };
    },
    methods: {
      appendToExpression(value) {
        this.expression += value;
      },
      clearExpression() {
        this.expression = '';
      },
      backspace() {
        this.expression = this.expression.slice(0, -1);
      },
      evaluate() {
        try {
          this.expression = eval(this.expression);
        } catch (e) {
          this.expression = 'Error';
        }
      }
    }
  };
  </script>
  
  <style scoped>
  .calculator {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 50px auto;
    font-size: 24px;
  }
  
  .display {
    margin-bottom: 20px;
    padding: 10px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 300px;
    text-align: right;
  }
  
  .buttons {
    display: flex;
    flex-direction: column;
  }
  
  .row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }
  
  button {
    width: 70px;
    height: 50px;
    font-size: 18px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #fff;
    cursor: pointer;
  }
  </style>