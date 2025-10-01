const dictionary = {
  "Sobre a Pizzaria": "About the Pizzeria",
  "Cardápio": "Menu",
  "Donos da Pizzaria": "Owners",
  "Contato": "Contact",
  "Molho de tomate, mussarela e manjericão fresco.": "Tomato sauce, mozzarella, and fresh basil.",
  "Mussarela, calabresa fatiada e cebola roxa.": "Mozzarella, sliced calabrese, and red onion.",
  "Cadastro": "Register",
  "Login": "Login",
  "Sobre": "About",
  "Donos": "Owners",
  "A Pizzaria LM's nasceu com a missão de levar sabor e qualidade até você. Trabalhamos com ingredientes frescos e selecionados, garantindo a melhor experiência para nossos clientes. Nosso objetivo é que cada fatia conte uma história de tradição e carinho.": "LM's Pizzeria was founded with the mission of bringing you flavor and quality. We work with fresh, carefully selected ingredients, ensuring the best experience for our customers. Our goal is for each slice to tell a story of tradition and care.",
  "Calabresa": "Pepperoni",
  "Quatro Queijos": "Four Cheeses",
  "Frango com Catupiry": "Chicken with Catupiry",
  "Responsável pelas receitas artesanais e pelo cuidado com os ingredientes frescos.": "Responsible for artisanal recipes and care with fresh ingredients.",
  "Fundador e pizzaiolo chefe, especialista em massas e sabores tradicionais italianos.": "Founder and head pizza maker, specializing in traditional Italian pasta and flavors.",
  "Responsável pelo atendimento e pela experiência do cliente no salão e delivery.": "Responsible for customer service and experience in the salon and delivery.",
  "Gestor da pizzaria, cuidando da organização, inovação e qualidade em cada detalhe.": "Pizzeria manager, taking care of organization, innovation and quality in every detail.",
  "Endereço": "Adress",  
  "Telefone": "Phone",
  "Todos os direitos reservados": "All rights reserved"
  
  // Adicione todo o texto do site aqui
};

function translatePage(lang) {
  document.querySelectorAll("[data-pt]").forEach(el => {
    const key = el.getAttribute("data-pt");
    el.innerText = (lang === 'en' && dictionary[key]) ? dictionary[key] : key;
  });
}
