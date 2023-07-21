import './App.css';
import Quiz from './component/Quiz';
import PlayQuiz from './component/PlayQuiz';
import Results from './component/Result';
import {
  Route,
  Routes
}  from "react-router-dom";
import {app} from './firebase-config';
function App() {
  return (
    <div className='app-main'>
    <Routes>
    <Route exact path='/' element={<Quiz />} />
    <Route exact path='/play' element={<PlayQuiz />} />
    <Route exact path='/results' element={<Results />} />
    </Routes>
    </div>
   
  );
}

export default App;
