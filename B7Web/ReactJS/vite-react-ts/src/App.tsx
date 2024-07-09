import { SubmitHandler, useForm } from "react-hook-form";

function App() {

  type Inputs = {
    name: string;
    lastName: string;
  };

  const { handleSubmit, register } = useForm<Inputs>();

  const handleFormSubmit: SubmitHandler<Inputs> = (data) => {
    console.log(data);
  }

  return (
    <div className="container mx-auto">
      <form onSubmit={handleSubmit(handleFormSubmit)}>
        <input 
          {...register("name")} 
          className="border border-black" 
          placeholder="Digite seu name"
        />
      
        <input 
          {...register("lastName")} 
          className="block mt-4 border border-black" 
          placeholder="Digite seu sobrenome"
        />

        <input type="submit" />
      </form>
    </div>
  )
}

export default App
