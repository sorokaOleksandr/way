#include <iostream.h>

class Balonka
{
      public:
             int GetVozrast();
             void SetVozrast(int vozrast);
             double GetVes();
             void SetVes(double ves);
             void Gav();
      private:
              int itsVozrast;
              double itsVes;
              };
              
              int Balonka::GetVozrast()
              {
                  return itsVozrast;
                  }
                  double Balonka::GetVes()
                  {
                      return itsVes;
                      }
                      
                      void Balonka::SetVozrast(int vozrast)
                      {
                           itsVozrast = vozrast;
                           }
                           
                           void Balonka::SetVes(double ves)
                           {
                                itsVes = ves;
                                }
                                
                                void Balonka::Gav()
                                {
                                     cout << "Gav.\n";
                                     }
int main()
{
    Balonka Basya;
    Basya.SetVozrast(3);
    cout << "Basin vozrast: " << Basya.GetVozrast() << " goda.\n";
    Basya.SetVes(3.1);
    cout << "Basin ves: " << Basya.GetVes() <<" kg.\n";
    Basya.Gav();
    Basya.Gav();
    Basya.Gav();
    Basya.Gav();
    Basya.Gav();
    system("pause");
    return 0;
}
                                               
