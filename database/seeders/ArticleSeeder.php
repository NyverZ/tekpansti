<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'What Is HACCP and Why It Matters in Food Safety',
                'slug' => 'what-is-haccp-and-why-it-matters-in-food-safety',
                'description' => 'HACCP is a preventive food safety system used to identify and control hazards before they cause harm. It helps food businesses and households reduce contamination risks and improve public health protection.',
                'content' => <<<'TEXT'
Introduction

Hazard Analysis and Critical Control Points, or HACCP, is one of the most important systems in modern food safety. It was developed to prevent food safety problems before they happen rather than reacting after consumers become sick. This preventive approach makes HACCP highly valuable in food businesses, schools, hospitals, catering operations, and public food education programs.

Main Content

HACCP begins with identifying hazards that may appear during food purchasing, storage, preparation, cooking, cooling, transport, or service. These hazards can be biological, such as bacteria, viruses, and parasites; chemical, such as detergent residues or pesticide contamination; or physical, such as glass fragments, plastic, or metal pieces. Once hazards are identified, food handlers determine where in the process the risks can be controlled.

These points are called critical control points. Examples include cooking poultry to a safe internal temperature, refrigerating ingredients below 5 C, cooling cooked food quickly, and preventing raw meat juices from contaminating ready-to-eat foods. If a process is not controlled at these stages, food may become unsafe and cause illness.

One reason HACCP matters so much is that it creates a structured and scientific way to think about food safety. Instead of depending only on routine habits or visual checks, HACCP requires monitoring, clear procedures, and corrective action. This improves consistency and helps reduce human error. In educational settings, HACCP is also useful because it shows how food safety can be managed systematically rather than by guesswork.

Food Safety Tips

Identify hazards before preparing food, especially when handling meat, fish, eggs, and dairy products.

Pay close attention to critical points such as cooking, chilling, storage, and hand hygiene.

Set clear procedures so food handlers know what must be monitored and when action is needed.

Take corrective action immediately if food is cooked improperly, stored unsafely, or exposed to contamination.

Conclusion

HACCP is important because it helps prevent hazards before they reach the consumer. By focusing on risk identification, control points, monitoring, and corrective action, HACCP strengthens food safety and protects public health. Understanding HACCP gives people a solid foundation for making kitchens, businesses, and communities safer.
TEXT,
            ],
            [
                'title' => 'The Importance of Food Hygiene in Preventing Foodborne Illness',
                'slug' => 'the-importance-of-food-hygiene-in-preventing-foodborne-illness',
                'description' => 'Food hygiene plays a central role in stopping harmful germs from entering the food supply. Good hygiene practices protect families, customers, and communities from foodborne illness.',
                'content' => <<<'TEXT'
Introduction

Food hygiene refers to the conditions and practices needed to keep food safe from contamination. It includes clean hands, clean utensils, clean surfaces, safe water, and proper food handling from preparation to serving. Although hygiene sounds basic, it remains one of the strongest defenses against foodborne illness.

Main Content

Food can become contaminated at any stage if hygiene is poor. Harmful microorganisms such as Salmonella, E. coli, and norovirus may spread through dirty hands, unwashed produce, contaminated water, unclean chopping boards, or poorly maintained kitchens. Once these hazards reach food, they can cause vomiting, diarrhea, fever, dehydration, and in some cases severe complications.

Good hygiene reduces these risks by limiting the movement of germs from people, surfaces, and equipment into food. Handwashing with soap and running water is especially important because hands often touch multiple surfaces during meal preparation. Cleaning and sanitizing tools and surfaces after handling raw ingredients also prevents contamination from spreading to cooked or ready-to-eat food.

Food hygiene is important because unsafe food does not always look spoiled. A meal may smell normal, taste normal, and still contain harmful microorganisms. This means that hygiene cannot depend on appearance alone. It must be based on daily habits, careful routines, and a clean working environment.

Food Safety Tips

Wash hands before preparing food and after touching raw meat, waste, or unclean surfaces.

Use safe water for washing, cooking, and preparing drinks.

Clean and sanitize knives, cutting boards, and counters regularly.

Wash fruits and vegetables before eating, cutting, or cooking them.

Conclusion

Food hygiene is essential because it stops contamination before it reaches the plate. Clean hands, clean tools, and clean environments are simple but effective ways to prevent foodborne illness. When hygiene becomes a daily habit, food becomes safer for families, students, customers, and the wider community.
TEXT,
            ],
            [
                'title' => 'Safe Food Storage Practices at Home',
                'slug' => 'safe-food-storage-practices-at-home',
                'description' => 'Safe storage helps maintain food quality and prevents harmful microorganisms from multiplying. Proper temperature control, separation, and labeling are key parts of safe home food management.',
                'content' => <<<'TEXT'
Introduction

Food storage is one of the most important yet often overlooked parts of food safety. Even well-prepared food can become unsafe if it is stored at the wrong temperature or placed in an unsuitable container. Good storage practices protect food from contamination, spoilage, and unnecessary waste.

Main Content

The first principle of safe storage is temperature control. Perishable foods such as milk, cooked rice, meat, fish, poultry, eggs, and leftovers should be refrigerated promptly. Keeping these foods cold slows the growth of microorganisms and helps preserve freshness. Dry ingredients such as flour, grains, and spices should be stored in clean, dry conditions away from humidity and pests.

The second principle is separation. Raw foods, especially animal products, should be kept away from cooked and ready-to-eat foods. If raw meat or fish leaks in the refrigerator, harmful microorganisms may spread to fruit, vegetables, or leftovers. Using sealed containers and storing raw foods on lower shelves helps reduce this risk.

Labeling and rotation are also useful at home. People often forget when leftovers were prepared or opened. Labeling containers with the date helps ensure that food is eaten while still safe and of good quality. Organized storage also prevents older food from being forgotten until it spoils.

Food Safety Tips

Refrigerate perishable food within two hours after cooking or purchase.

Store raw meat, fish, and poultry in sealed containers on lower shelves.

Keep the refrigerator clean and avoid overcrowding so cold air can circulate.

Label leftovers with the date and consume them within a safe time period.

Conclusion

Safe food storage at home is a practical and effective way to reduce foodborne illness. By managing temperature, preventing leaks, separating raw and cooked foods, and using proper containers, households can protect food quality and improve kitchen safety every day.
TEXT,
            ],
            [
                'title' => 'Understanding Cross Contamination in the Kitchen',
                'slug' => 'understanding-cross-contamination-in-the-kitchen',
                'description' => 'Cross contamination happens when harmful microorganisms or substances move from one surface or food to another. It is a common but preventable cause of foodborne illness in home and commercial kitchens.',
                'content' => <<<'TEXT'
Introduction

Cross contamination is one of the most common food safety risks in kitchens. It occurs when bacteria, viruses, allergens, or other harmful materials are transferred from one food, surface, or object to another. Because it often happens silently, many people do not recognize it until illness occurs.

Main Content

A typical example of cross contamination is using the same cutting board for raw chicken and fresh vegetables without washing it first. The chicken may carry harmful bacteria, and those bacteria can then move to food that will not be cooked again. The same problem can happen through hands, knives, kitchen towels, countertops, sinks, plates, and storage containers.

Raw meat, poultry, seafood, and eggs are common sources of contamination because they may naturally contain microorganisms. However, cross contamination is not limited to animal foods. Dirty produce, contaminated packaging, unwashed hands, and unclean water can also spread hazards. Allergens such as peanuts or shellfish may also cross from one food to another and cause serious reactions in sensitive individuals.

Preventing cross contamination requires separation, cleaning, and awareness. Separate equipment should be used whenever possible. When that is not possible, washing and sanitizing between tasks is essential. Storage order also matters. Raw food should never be placed above cooked or ready-to-eat food because drips and leaks can spread contamination.

Food Safety Tips

Use separate cutting boards for raw and ready-to-eat foods.

Wash hands after touching raw ingredients, waste, or unclean surfaces.

Clean and sanitize knives, boards, sinks, and counters after each task.

Store raw foods below cooked and ready-to-eat foods in the refrigerator.

Conclusion

Cross contamination is dangerous because it can quickly turn safe food into unsafe food. The good news is that it is highly preventable through simple routines such as separation, cleaning, and organized storage. Understanding this risk helps the public make safer choices every time they prepare food.
TEXT,
            ],
            [
                'title' => 'Safe Cooking Temperatures for Common Foods',
                'slug' => 'safe-cooking-temperatures-for-common-foods',
                'description' => 'Cooking food to the correct temperature destroys many harmful microorganisms and reduces the risk of illness. Temperature control is especially important for poultry, meat, seafood, eggs, and leftovers.',
                'content' => <<<'TEXT'
Introduction

Cooking is one of the strongest barriers against foodborne illness because heat can destroy harmful microorganisms. However, cooking only works effectively when the food reaches a safe internal temperature. This is why safe cooking temperatures are a key part of food safety education.

Main Content

Different foods require different levels of cooking care. Poultry is one of the highest-risk foods and should generally reach at least 75 C internally. Ground or minced meat must be cooked thoroughly because microorganisms may be spread throughout the product during processing. Fish should be cooked until the flesh becomes opaque and flakes easily. Eggs should be cooked until the white and yolk are set when preparing food for vulnerable groups.

Leftovers also need careful reheating. Food should be heated until it is steaming hot throughout, not just warm on the surface. Large dishes should be stirred when possible so heat spreads evenly. If food is only partially heated, harmful microorganisms may survive in cooler sections.

A food thermometer provides the most reliable way to confirm safe cooking. Visual signs such as color or texture can help, but they are not always accurate. Using temperature checks helps reduce guesswork and supports better food safety habits in both home and professional kitchens.

Food Safety Tips

Cook poultry to at least 75 C internally.

Reheat leftovers until they are steaming hot throughout.

Use a clean food thermometer when preparing thick foods or large portions.

Do not serve meat or eggs undercooked to high-risk individuals.

Conclusion

Safe cooking temperatures matter because they help destroy dangerous microorganisms before food is eaten. Temperature control turns cooking into an important food safety step rather than just a preparation method. When people understand proper cooking temperatures, they make meals safer and more reliable.
TEXT,
            ],
            [
                'title' => 'How Food Poisoning Happens and How to Prevent It',
                'slug' => 'how-food-poisoning-happens-and-how-to-prevent-it',
                'description' => 'Food poisoning happens when people consume food contaminated with harmful microorganisms, toxins, or chemicals. Prevention depends on safe sourcing, hygiene, temperature control, and proper storage.',
                'content' => <<<'TEXT'
Introduction

Food poisoning is a common health problem that affects millions of people worldwide. It may cause nausea, vomiting, diarrhea, stomach pain, fever, and dehydration. Although many cases are mild, some can become serious, especially for children, older adults, pregnant women, and people with weak immune systems.

Main Content

Food poisoning happens when food becomes contaminated with harmful bacteria, viruses, parasites, toxins, or chemicals. Contamination can happen at any stage, including production, transport, storage, cooking, or serving. Even safe ingredients can become unsafe if they are handled improperly.

Common causes include poor hand hygiene, undercooking, cross contamination, unsafe water, and leaving food at room temperature for too long. One challenge is that contaminated food often looks normal. It may not smell bad or appear spoiled, which means people cannot rely only on their senses to judge safety.

Prevention starts with clean food handling. Washing hands, cleaning tools, separating raw and cooked items, and cooking thoroughly are all essential. Refrigeration also plays a major role. Harmful microorganisms grow faster when perishable foods are left in unsafe temperature conditions. Safe storage and prompt refrigeration are therefore critical.

Food Safety Tips

Wash hands and clean utensils before and during food preparation.

Cook food thoroughly, especially meat, poultry, eggs, and leftovers.

Keep hot food hot and cold food cold.

Avoid leaving cooked food at room temperature for extended periods.

Conclusion

Food poisoning happens when hazards are allowed to enter food, survive, or multiply. The most effective protection is prevention through hygiene, temperature control, safe storage, and careful preparation. Public understanding of these habits can greatly reduce illness and improve food safety at home and in the community.
TEXT,
            ],
            [
                'title' => 'The Role of Nutrition in Maintaining Food Safety',
                'slug' => 'the-role-of-nutrition-in-maintaining-food-safety',
                'description' => 'Nutrition and food safety are closely connected because safe food should also support health and well-being. A complete food education approach teaches people how to choose foods that are both nutritious and safe to consume.',
                'content' => <<<'TEXT'
Introduction

Food safety and nutrition are often discussed as separate topics, even though they are closely connected. A meal should not only be rich in nutrients but also be safe to prepare, store, and consume. Public food education becomes stronger when both ideas are taught together.

Main Content

Nutrition helps the body grow, repair tissues, maintain energy, and support immunity. Safe meals that include carbohydrates, protein, vegetables, fruit, and adequate hydration contribute to good health. However, nutritious foods can still become dangerous if they are contaminated or handled improperly.

Fresh vegetables and fruit are good examples. They contain valuable vitamins, minerals, and fiber, but they still need proper washing before being eaten raw. Protein-rich foods such as fish, eggs, milk, tofu, and chicken support balanced diets, yet they also require careful temperature control and hygienic preparation. In this way, safe handling protects the nutritional value people seek from food.

Nutrition education can also support safer food behavior. People who plan balanced meals are often more likely to store food properly, reduce waste, and avoid repeatedly reheating leftovers. Understanding nutrition encourages smarter food choices, but food safety knowledge ensures those choices remain safe from preparation to consumption.

Food Safety Tips

Wash fresh produce before eating, cutting, or cooking it.

Store protein foods correctly to preserve both safety and quality.

Use balanced meal planning to reduce food waste and repeated reheating.

Choose fresh foods from safe and reliable sources.

Conclusion

Nutrition and food safety should work together because healthy food must also be safe food. Teaching both concepts at the same time helps the public build stronger food literacy and better daily habits. Safe and nutritious meals are essential for personal and community health.
TEXT,
            ],
            [
                'title' => 'Personal Hygiene for Food Handlers',
                'slug' => 'personal-hygiene-for-food-handlers',
                'description' => 'Personal hygiene is one of the most basic and effective ways to prevent contamination during food preparation. Food handlers play a direct role in protecting the health of everyone who eats the food they prepare.',
                'content' => <<<'TEXT'
Introduction

Food handlers have a direct influence on the safety of meals served to others. Personal hygiene refers to the cleanliness, health, and habits of the person preparing, handling, or serving food. Even if ingredients are fresh and equipment is available, poor hygiene can still make food unsafe.

Main Content

Hands are one of the most common ways contamination spreads. A person may touch raw ingredients, dirty surfaces, waste, or their own face and then handle food. Without proper handwashing, harmful microorganisms can be transferred into meals. That is why handwashing must happen at key times, not just at the start of cooking.

Personal hygiene also includes clean clothing, short nails, and proper care of cuts or wounds. Long nails, jewelry, and uncovered injuries may trap dirt and germs. In professional settings, clean uniforms and hair restraints help reduce contamination risks further.

Health condition also matters. Food handlers who are experiencing vomiting, diarrhea, fever, or infectious skin problems should not prepare food for others. Illness can spread quickly through food if people continue working while unwell. Public education should emphasize that food safety begins with personal responsibility.

Food Safety Tips

Wash hands with soap and running water for at least 20 seconds.

Keep nails short and clean and cover wounds before handling food.

Wear clean clothing and keep hair away from food preparation areas.

Do not prepare food for others when you are sick.

Conclusion

Personal hygiene is one of the simplest and most effective barriers against food contamination. When food handlers stay clean, healthy, and aware of their habits, they help prevent foodborne illness and protect the people they serve. Safe food handling always begins with safe personal behavior.
TEXT,
            ],
            [
                'title' => 'Safe Handling of Meat, Fish, and Poultry',
                'slug' => 'safe-handling-of-meat-fish-and-poultry',
                'description' => 'Meat, fish, and poultry are nutritious foods but they require careful handling because they spoil easily and may carry harmful microorganisms. Safe sourcing, storage, preparation, and cooking are all necessary to reduce risk.',
                'content' => <<<'TEXT'
Introduction

Meat, fish, and poultry are important sources of protein and other nutrients, but they are also highly perishable foods. If they are stored or prepared incorrectly, they may become a source of serious foodborne illness. This makes safe handling of animal foods a major part of food safety education.

Main Content

Safe handling begins at the point of purchase. Products should come from clean and trusted sellers, be kept cold, and show normal appearance and odor. After purchase, they should be taken home quickly and refrigerated or frozen without delay. Time and temperature abuse can increase spoilage and microbial growth.

Storage must prevent leakage and contamination. Raw meat, fish, and poultry should be stored in sealed containers and placed below ready-to-eat foods in the refrigerator. Freezing can help preserve food longer, but thawing should be done safely in the refrigerator, under controlled cold running water, or by direct cooking methods, not by leaving food out for long periods.

Preparation requires separation and cleaning. Separate cutting boards and knives should be used where possible. If the same equipment must be reused, it should be washed and sanitized properly first. Cooking is the final major control step. Poultry in particular must be cooked thoroughly, while fish and meat should be handled according to safe cooking guidance.

Food Safety Tips

Buy animal foods from reliable and hygienic sources.

Refrigerate or freeze them promptly after purchase.

Store raw animal products in sealed containers below ready-to-eat foods.

Cook meat, fish, and poultry thoroughly before serving.

Conclusion

Safe handling of meat, fish, and poultry is essential because these foods can become hazardous quickly if mishandled. Good habits during purchasing, storage, preparation, and cooking greatly reduce risk. By following simple safety steps, people can enjoy these foods with more confidence and less danger.
TEXT,
            ],
            [
                'title' => 'Common Food Safety Mistakes at Home',
                'slug' => 'common-food-safety-mistakes-at-home',
                'description' => 'Many food safety problems in households come from small routine mistakes rather than major accidents. Recognizing these habits is the first step toward building a safer home kitchen.',
                'content' => <<<'TEXT'
Introduction

Home kitchens are where many meals are prepared with care, but they are also places where food safety mistakes happen frequently. Familiarity can lead people to skip important steps, especially when they are busy or confident in old habits. Recognizing common household mistakes is the first step toward preventing foodborne illness.

Main Content

One common mistake is not washing hands often enough. People may wash before cooking but forget to do so again after handling raw meat, eggs, waste, or dirty surfaces. Another common problem is using the same cutting board or knife for raw and cooked foods without proper cleaning. This creates a high risk of cross contamination.

Improper storage is also a frequent issue. Leftovers may be left out too long, refrigerators may be overcrowded, or raw foods may be placed above ready-to-eat meals. These habits increase the chance of spoilage and contamination. Some households also thaw frozen food at room temperature for long periods, which allows microorganisms to grow more quickly.

Another mistake is judging safety only by smell or appearance. Food may seem normal and still be unsafe. Reheating leftovers unevenly is also risky because the outer part of the food may feel hot while the inside remains too cool to destroy harmful microorganisms.

Food Safety Tips

Wash hands repeatedly during food preparation, not only once at the beginning.

Separate raw and cooked foods during storage and preparation.

Refrigerate leftovers promptly and reheat them thoroughly.

Do not rely only on smell or appearance to decide whether food is safe.

Conclusion

Most food safety mistakes at home are small but important. When repeated often, they can lead to illness and food waste. The good news is that these mistakes are easy to reduce through awareness, better routines, and consistent kitchen habits.
TEXT,
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                [
                    'title' => $article['title'],
                    'content' => "Short Description\n\n{$article['description']}\n\n{$article['content']}",
                    'image' => null,
                    'is_published' => true,
                ]
            );
        }
    }
}
