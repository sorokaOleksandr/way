#include <iostream.h>
#include <fstream.h>

class Animal
{
      public:
             Animal(int weight, long days):itsWeight(weight),itsNamberDaysAlive(days)
             {}
             ~Animal(){}
             
             int GetWeight()const { return itsWeight; }
             void SetWeight(int weight){ itsWeight = weight; }
             
             long GetDaysAlive()const { return itsNamberDaysAlive; }
             void SetDaysAlive(long days) { itsNamberDaysAlive = days; }
             
             
      private:
              int itsWeight;
              long itsNamberDaysAlive;
};

int main()
{
    char fileName[80];
    cout << "Enter the file name: ";
    cin >> fileName;
    
    ofstream fout(fileName,ios::binary);
    if(!fout)
    {
             cout << "Unable to open" << fileName << "for writing\n";
             return(1);
    }
    
    Animal Bear(100,150);
    fout.write((char*)&Bear,sizeof Bear);
    
    fout.close();
    
    ifstream fin(fileName,ios::binary);
    if(!fin)
    {
            cout << "Unable to open" << fileName << " for reading\n";
            return(1);
    }
    
    Animal BearTwo(1,1);
    
    cout << "BearTwo weight: " << BearTwo.GetWeight() << endl;
    cout << "BearTwo days: " << BearTwo.GetDaysAlive() << endl;
    
    fin.read((char*)&BearTwo, sizeof BearTwo);
    
    cout << "BearTwo weight: " << BearTwo.GetWeight() << endl;
    cout << "BearTwo days: " << BearTwo.GetDaysAlive() << endl;
    fin.close();
    
    system("pause");
    return 0;
}
    
