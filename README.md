# world-songs

## What is this project?
This is a project that I've had the idea for for some time now. This is an HTML table powered by PHP containing every single song that has ever charted on the main song charts of several countries around the world, with each song in the table having a unique CSS styling--every single song in the table has a unique combination of fonts, styles and colors based on its position in the table, and no two rows have exactly the same kind of styling. The table and PHP code are written in WorldSongs.php. The styling is powered by WorldSongs.css. The rows that will go into the table are written in WorldSongs.csv.

## What kinds of stylings are given to the songs?
Just to give you an understanding of all the different types of stylings and how much later rows of this table would eventually look, let me explain how each row is assigned a style.

The first 19,182 rows are assigned a style based on the text and background color each being one of the 148 CSS colors with names supported by all browsers (https://www.w3schools.com/cssref/css_colors.php), going in alphabetical order by color name. Colors with two names (aqua/cyan, fuchsia/magenta, the colors with the word "gray" in them, spelled with either an "a" or "e" have the duplicate removed, bringing us down to 139 colors). Also, the text and background color cannot be the same as that would be too difficult to read, so stylings where the background and text color are identical are skipped (even though 2 different colors that look very similar or where it may be difficult to read due to the colors not contrasting well are not skipped). For example, the very first row has the background color aliceblue and the text color antiquewhite. The second row has the background color aliceblue and the text color aqua. The third row has the background color aliceblue and the text color aquamarine, and so on. This continues down to the 138th row, which will have the background color aliceblue and the text color yellowgreen. Then, we move onto the next background color in alphabetical order. So the 139th row will have the background color antiquewhite and the text color aliceblue, the 140th row will have the background color antiquewhite and the text color aqua, the 141st row will have the background color antiquewhite and the text color aquamarine, and so on. This pattern will continue until the 19182nd row is reached, which will have the background color yellowgreen and the text color yellow. In Simplified.php, I've written a simplified version of this, using only 5 colors--red, green, 

Once we reach the 19183rd row, the pattern from the beginning will repeat, with one difference. Rows 19813-38364 will have the exact same background/text color combinatins as rows 1-19182, except the text of these rows will be italicized. Then, starting on row 38365, we start from the beginning again, except all these rows will have bolded text.

Then, on row 76729, we move onto text decorations. This was easily the most difficult part of the PHP code to write. Once again, the patterns from the first 76728 rows will repeat, except these rows will have text decorations (overline, line-through and/or underline). These text decorations can be in one of 5 different styles (solid, double, dotted, dashed and wavy) and can be one of any of the 139 aforementioned CSS colors. Also, similar to how the text and background color cannot be the same, the text decoration and background color cannot be the same (although the text and text decoration can be the same color). The 76729th row will have the background color antiquewhite, the text color aliceblue and the text decoration color aliceblue (the background color of aliceblue is skipped because the text decoration color is aliceblue). These rows will all have a text decoration of overline. Once we finish all these combinations, on row 152905, the pattern will repeat, except the text decoration will be line-through. Then, starting on row 229081, the pattern repeats again, except the text decoration will be underline. Then the pattern repeats again, except the text decoration is both underline and line-through. This continues until all 7 combinations of these 3 types of text decorations are used. Once this happens, the whole pattern, starting on row 76729 with the beginning of the text decorations repeats again, except the text decorations will be the next color in alphabetical order--antiquewhite, and this will continue for all 139 colors. Once we reach row 74195977, we then repeat the entire pattern starting from row 76729, but move onto the next text decoration style (all the text decorations up to this point were in the style solid, but now they will be in the style double). Then dotted, then dashed, then wavy.

Now we are done with text decorations. Once we reach row 370672969, we repeat the entire pattern from the beginning, except all these rows will have their text appear in all caps. Once we get through these combinations, it repeats again, except these rows have their text appear in all lowercase. Then one more time, with all the rows appearing in small caps.

Finally, we move onto fonts. All the songs up to this point had been in Arial. Now we repeat everything from the beginning, except have the font be in Arial Black. Then in Comic Sans MS, then Courier New, Georgia, Impact, Lucida Console, Lucida Sans Unicode, Palatino Linotype, Tahoma and Times New Roman. I chose these 11 fonts because they're all browser-friendly and recognized by essentially all browsers. By the way, text in Arial Black looks the same whether it is bolded or not, so I also skipped all combinations in Arial Black that use bold, since they look the same without it (coding it so it would skip all those combinations was also a bit of a hassle!).

And that's every single combination. In total, that leaves us with 15,568,264,656 unique combinations. Of course, I don't even think I'm going to get every single combination with the first font used up even if I include every song that's ever charted on any official music chart anywhere, so a good majority of those are going to go unused, but at least I have plans on what to do if it does get that far. I have nothing planned for the 15568264657th row and beyond because I'm pretty sure I'm never going to get past that point. I also have a Random.php file that generates 50 rows in the table, each with a random font/color/style combination, so you can also check that out if you want to see what much later rows would look like.

## What order are the songs listed in the table?
The songs in the table are listed in order of when they charted on any of these countries' charts, which is also how they will each get assigned their font/color/style combination.

## Which countries will have songs from their charts in the table?
Right now, I have 8 countries (Australia, Canada, France, Germany, Japan, New Zealand, the United Kingdom and United States), but I am thinking of adding more, especially with how many different font combinations I have so I can add even more songs and used even more combinations. Of course, data on certain countries' charts is hard to come by. Sometimes, even these countries' charts' official websites don't go all the way back to their inception, or only list the top 10 or 20 positions when there were officially 100 positions, or are only available via the Wayback Machine.

## Isn't this an awful lot of work?
Yes, compiling all this data and putting them all in the table is an insurmountable task, which is why I can't do it all alone. If you would like to help with this project (especially if you're a fellow computer programmer who's also a massive music geek), don't hesitate to ask. Also, you can check the "Issues" tab on this project's GitHub repository (https://github.com/davenpos/world-songs) to see what other issues I'm currently facing with this project and currently need help with. I appreciate any help I can get! My email is simmywim@hotmail.com and my Discord server invite link is discordapp.com/invite/U6bkBgy if you'd like to get in contact with me and help out if you want.

I hope to have this project fully complete, with as many countries' main song charts as possible and caught up to the present day one day! If you can help out in any way, I'd love to have you on board with this project!

-Simeon Davenport
