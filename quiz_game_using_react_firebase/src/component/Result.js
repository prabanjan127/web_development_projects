import React from "react";
import { useLocation } from "react-router-dom";
import Button from "@mui/material/Button";
import { useNavigate } from "react-router-dom";
import { database } from "../firebase-config";
import { getDocs, collection } from "firebase/firestore";
import Table from "./common/Table";
import Divider from '@mui/material/Divider';
export default function Result() {
  const databaseRef = collection(database, "Leader Board");
  const navigate = useNavigate();
  const { state } = useLocation();
  const [finalResult, setFinalResult] = React.useState(0);
  const [leaderBoardData, setLeaderBoardData] = React.useState([]);
  React.useEffect(() => {
    if(state)
    {
        const { finalResults } = state;
        setFinalResult(finalResults)
    }
    
    getData()
  }, [state]);
  const getData = async () => {
    const data = await getDocs(databaseRef);
    setLeaderBoardData(data.docs.map((doc) => ({...doc.data(), id: doc.id }))
    .sort((a,b) => parseFloat(b.finalScore) - parseFloat(a.finalScore))
    )
  };
  const retryQuiz = () => {
    navigate("/");
  };
  return (
    <div>
      <h1>Results</h1>
      {finalResult ? (
 <h2>Final Score is {finalResult}</h2>
      ): (
        ""
      )}    
     
      <Button
        onClick={retryQuiz}
        variant="contained"
        style={{ marginBottom: 30 }}
      >
        Play Again
      </Button>
      <Divider />
      <h2>Leader Board</h2>
      <div style={{margin: 20}}>
      <Table leaderBoardData={leaderBoardData}/>
      </div>
      {/* <div style={{margin: 20}}> */}
    </div>
  )
}
