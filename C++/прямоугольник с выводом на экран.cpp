#include <iostream.h>
//intintboolfalsetrue
enum CHOICE { DrawRect = 1, GetArea, GetPerim, ChangeDimensions, Quit};

class Rectangle
{
      public:
              Rectangle(int shirina, int visota);
              ~Rectangle();
              int GetVisota() const { return itsVisota; }
              int GetShirina() const { return itsShirina; }
              int GetArea() const { return itsVisota * itsShirina; }
              int GetPerim() const { return 2 * itsVisota + 2 * itsShirina; }
              void SetSize(int newShirina, int newVisota);
     private:
             int itsShirina;
             int itsVisota;
};
void Rectangle::SetSize(int newShirina, int newVisota)
{
     itsShirina = newShirina;
     itsVisota = newVisota;
}
Rectangle::Rectangle(int shirina, int visota)
{
                         itsShirina = shirina;
                         itsVisota = visota;
}
Rectangle::~Rectangle(){}

int DoMenu();
void DoDrawRect(Rectangle);
void DoGetArea(Rectangle);
void DoGetPerim(Rectangle);

int main()
{
    Rectangle theRect(30,5);
    int choice = DrawRect;
    int fQuit = false;
    
    while(!fQuit)
    {
                 choice = DoMenu();
                 if(choice < DrawRect || choice > Quit)
                 {
                           cout << "Nepravelniy Vvod!!!\n";
                           continue;
                           }
switch(choice)
{
              case DrawRect:
                   DoDrawRect(theRect);
                   break;
              case GetArea:
                   DoGetArea(theRect);
                   break;
              case GetPerim:
                   DoGetPerim(theRect);
                   break;
              case ChangeDimensions:
                   int newShirina, newVisota;
                   cout << "\nNewShirina: ";
                   cin >> newShirina;
                   cout << "NewVisota: ";
                   cin >> newVisota;
                   theRect.SetSize(newShirina, newVisota);
                   DoDrawRect(theRect);
                   break;
              case Quit:
                   fQuit = true;
                   cout << "\n Exiting...\n\n";
                   break;
              default:
                      cout << "Error in choice!\n";
                      fQuit = true;
                      break;
                      }
}
system("pause");
return 0;
}

int DoMenu()
{
    int choice;
    cout << "\n\n*** Menu *** \n";
    cout << "(1) Draw Rectangle \n";
    cout << "(2) Area \n";
    cout << "(3) Perimetr \n";
    cout << "(4) Vvod novih parametrov \n";
    cout << "(5) Quit \n";
    
    cin >> choice;
    return choice;
}


void DoDrawRect(Rectangle theRect)
{
     int visota = theRect.GetVisota();
     int shirina = theRect.GetShirina();
     
     for(int i = 0; i < visota; i++)
     {
             for(int j = 0; j < shirina; j++)
             cout << "*";
             cout << "\n";
             }
}

void DoGetArea(Rectangle theRect)
{
     cout << "Area: " << theRect.GetArea() << endl;
}
void DoGetPerim(Rectangle theRect)
{
     cout << "Perimetr: " << theRect.GetPerim() << endl;
}
   
    
    
               
                        
                           
                           
    
             
      
