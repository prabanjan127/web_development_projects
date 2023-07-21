import React from 'react'
import { useLocation,useNavigate } from 'react-router-dom';
import Button from "@mui/material/Button";
import Card from './common/Card';
import {database} from '../firebase-config';
import {addDoc, collection} from 'firebase/firestore';
export default function PlayQuiz() {
   const {state} = useLocation();
   const navigate = useNavigate();
   const [questionCounter, setQuesCounter] = React.useState(1);
   const [totalQuiz, setTotalQuiz] = React.useState(1);
   const [questionsArray, setQuesArray] = React.useState([]);
   const[quizType, setQuizType] = React.useState('');
   const[quizDifficulty, setQuizDifficulty] = React.useState('');
   const [result, setResult] = React.useState(0);
   const [playerName, setPlayerName] = React.useState('');
   const databaseRef = collection(database,'Leader Board')
   React.useEffect(()=>{
    const {quizData, quizCount, quizType, quizDifficulty } = state;
    setQuesArray(quizData)
    setTotalQuiz(quizCount)
    setQuizDifficulty(quizDifficulty)
    setQuizType(quizType)
    setPlayerName(localStorage.getItem('Playername'))
   },[state])
   
   const prevQuestion = () => {
    if(questionCounter > 1){
    setQuesCounter(questionCounter - 1)
    }
   } 
   const nextQuestion = () =>{
    if(questionCounter < Number(totalQuiz)){
    setQuesCounter(questionCounter +1)
    }
   } 
   const submitQuiz = () =>{
    addDoc(databaseRef,{
      PlayerName: playerName,
      difficulty: quizDifficulty,
      category: questionsArray[0].category,
      finalScore: result
    })
    .then(() => {
      navigate('/results', {
        state:{
          finalResults: result,
        }
      })
    })
   
   }
   
  return (
    <div>
        <h1>Play Quiz</h1>
       <h1>{result}</h1>
       {/* <div>
       <Button 
        onClick={prevQuestion}
        variant="contained" 
        disabled={questionCounter === 1? true: false}
        style={{ marginRight: 10 }}>
        Previous Question
      </Button>

      <Button 
        onClick={nextQuestion}
        variant="contained" 
        disabled={questionCounter === Number(totalQuiz) ? true : false}
        style={{ marginLeft: 10 }}>
        Next Question
      </Button>
       </div> */}
       <h2>Question Number: {questionCounter}</h2>
       <h3>Difficulty Level: {quizDifficulty}</h3>

       <Card 
       questionsArray={questionsArray}
       questionCounter={questionCounter}
       nextQuestion={nextQuestion}
       setResult={setResult}
       result={result}
       />
    {questionCounter ===  Number(totalQuiz) ? (
      <Button 
      onClick={submitQuiz}
      variant="contained" 

      style={{ marginLeft: 10 }}>
      Submit
    </Button>
    ) :(
      ""
    )}

    </div>
  )
}
