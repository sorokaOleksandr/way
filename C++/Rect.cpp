#include "Rect.hpp"
Pram::Pram(int verxniy, int leviy, int nigniy, int praviy)
{
               itsVerxniy = verxniy;
               itsLeviy = leviy;
               itsNigniy = nigniy;
               itsPraviy = praviy;
               
               itsVerxniyLeviy.SetX(leviy);
               itsVerxniyLeviy.SetY(verxniy);
               
               itsVerxniyPraviy.SetX(praviy);
               itsVerxniyPraviy.SetY(verxniy);
               
               itsVnizySleva.SetX(leviy);
               itsVnizySleva.SetY(nigniy);
               
               itsNigniyPraviy.SetX(praviy);
               itsNigniyPraviy.SetY(nigniy);
               }
int Tochka::GetOblast()const
{
      int Shirina = itsPraviy - itsLeviy;
      int Visota = itsVerxniy - itsNigniy;
      return(Shirina * Visota);
      }
      int main()
      {
          Pram MyPram (100, 20, 50, 80);
          int Oblast = MyPram.GetOblast();
          cout << "oblast: " << Oblast << "\n";
          cout << "Verxnaa levaya X coordinata:";
          cout << MyPram.GetVerxniyLeviy().GetX();
          system("pause");
          return 0;
          }    
