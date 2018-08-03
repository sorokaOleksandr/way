#include <iostream.h>

const int DefaultSize = 10;

class Animal
{
      public:
             Animal();
             Animal(int);
             ~Animal(){}
             
             int GetWeight() const { return itsWeight; }
             void Display() const { cout << itsWeight; }
      
      private:
              int itsWeight;
};

Animal::Animal():
 itsWeight(0)
 {}
 
Animal::Animal(int weight):
 itsWeight(weight)
 {}
 
template <class T>
class Arrey
{
      public:
             Arrey(int itsSize = DefaultSize);
             Arrey(const Arrey &rhs);
             ~Arrey() { delete [] pType; }
             
             Arrey &operator = (const Arrey &);
             T &operator[](int offSet) { return pType[offSet]; }
             const T &operator[](int offSet) const { return pType[offSet]; }
             
             int GetSize() const { return itsSize; }
             
      
      private:
              T *pType;
              int itsSize;
              
};

template <class T>
Arrey<T>::Arrey (int size):
 itsSize(size)
 {
              pType = new T[size];
              for(int i = 0; i < size; i++)
                pType[i] = 0;
 }
 
template <class T>
Arrey<T>::Arrey(const Arrey &rhs)
{
                      itsSize = rhs.GetSize();
                      pType = new T[itsSize];
                      for(int i = 0; i < itsSize; i++)
                       pType[i] = rhs[i];
}

template <class T>
Arrey<T> & Arrey<T>::operator=(const Arrey &rhs)
{
         if(this == &rhs)
           return *this;
         delete [] pType;
         itsSize = rhs.GetSize();
         pType = new T[itsSize];
         for(int i = 0; i < itsSize; i++)
           pType[i] = rhs[i];
         return *this;
}

int main()
{
    Arrey<int> theArrey;
    Arrey<Animal> theZoo;
    Animal *pAnimal;
    
    for(int i = 0; i < theArrey.GetSize(); i++)
    {
            theArrey[i] = i*2;
            pAnimal = new Animal(i*3);
            theZoo[i] = *pAnimal;
            delete pAnimal;
    }
    
for(int j = 0; j < theArrey.GetSize(); j++)
{
        cout << "theArrey[" << j << "]:\t";
        cout << theArrey[j] << "\t\t";
        cout << "theZoo[" << j << "]:\t";
        theZoo[j].Display();
        cout << endl;
}
system("pause");
return 0;
}
