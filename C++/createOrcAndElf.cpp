#include <iostream>
using namespace std;

class aliens
{
    public:
    aliens(int age=10, int damage=10);
    virtual void tell() const = 0;
    virtual void attack() const = 0;
    protected:
    int m_damage;
    int m_age;
};
aliens::aliens(int age, int damage):
m_age(age),
m_damage(damage)
{}

class ork: public aliens
{
    public:
    ork(int age = 115, int damage = 100);
    virtual void tell()const;
    virtual void attack()const;
};

ork::ork(int age, int damage):
aliens(age,damage)
{}

void ork::tell()const
{
    cout << "i am ork,i have " << m_age << " ears! \n";
}
void ork::attack()const
{
 cout << " attack ork: " << m_damage << "\n";
}

class elf: public aliens
{
  public:
  elf(int age = 250,int damage = 120);
  virtual void tell() const;
  virtual void attack() const;
};
elf::elf(int age,int damage):
aliens(age,damage)
{}
void elf::tell() const
{
    cout << "I am a elf and my name elf Nikolay ,i old elf i have " << m_age << "ears.\n";
}
void elf:: attack() const
{
    cout << " attack elf: " << m_damage << "\n";

}



int main()
{
  aliens *pOrk = new ork();
  pOrk->tell();
  pOrk->attack();
  delete pOrk;
  pOrk = 0;
    
  aliens *pElf = new elf();
  pElf->tell();
  pElf->attack();
  delete pElf;
  pElf = 0;
    
    return 0;
}
